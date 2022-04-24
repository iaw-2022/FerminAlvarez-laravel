<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshop;
use App\Models\Has;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BookshopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('canSeeBookshops')->only('index','show');
        $this->middleware('canManageBookshops')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookshops = Bookshop::all();
        return view('bookshops.index')->with('bookshops',$bookshops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view ('bookshops.create') -> with('books',$books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'city' => 'nullable|max:255',
            'street' => 'nullable|max:255',
            'number' => 'nullable|max:255',
            'prices.*' => 'gt:0'
        ]);


        $bookshop = new Bookshop();
        $bookshop->name = $request->get('name');
        $bookshop->city = $request->get('city');
        $bookshop->street = $request->get('street');
        $bookshop->number = $request->get('number');

        $bookshop->save();

        $books = $request->input('books');
        $prices = $request->input('prices');
        $index = 0;

        foreach((array)$books as $book){
            $has = new Has();
            $has->price = $prices[$index++];
            $has->ISBN = $book;
            $has->Bookshop = $bookshop->id;
            $has->save();
        }

        return redirect("/bookshops");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookshop = Bookshop::find($id);
        if($bookshop==null)
            abort(404);

        $books = $bookshop->books();
        return view('bookshops.show',compact('bookshop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookshop = Bookshop::find($id);
        if($bookshop==null)
            abort(404);

        $books = Book::All();
        return view('bookshops.edit')->with('bookshop',$bookshop)->with('books',$books);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'city' => 'nullable|max:255',
            'street' => 'nullable|max:255',
            'number' => 'nullable|max:255',
            'prices.*' => 'gt:0'
        ]);


        $bookshop = Bookshop::find($id);
        if($bookshop==null)
            abort(404);

        $bookshop->name = $request->get('name');
        $bookshop->city = $request->get('city');
        $bookshop->street = $request->get('street');
        $bookshop->number = $request->get('number');
        try {
            // Begin a transaction
            DB::beginTransaction();
            $bookshop->save();
            $bookshop->books()->detach();

            $books = $request->input('books');
            $prices = $request->input('prices');
            $index = 0;

            foreach((array)$books as $book){
                $has = new Has();
                $has->price = $prices[$index++];
                $has->ISBN = $book;
                $has->Bookshop = $bookshop->id;
                $has->save();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }


        return redirect("/bookshops/".$bookshop->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bookshop = Bookshop::find($id);
        if($bookshop==null)
            abort(404);

        $bookshop->delete();
        return redirect("/bookshops");
    }

    public function showOnlinePrice($id , $ISBN){
        $bookshop = Bookshop::find($id);
        if($bookshop==null)
            abort(404);

        $bookshopReference = $this->getURL($bookshop->name);
        $request = $this->callAPI($bookshopReference,$ISBN);

        if($request->status() != 200){
            return redirect("/bookshops/".$bookshop->id)->withErrors(["No se pudo encontrar el precio en línea",
            "El ISBN es incorrecto o no está publicado en la página de la librería"]);
        }

        $onlinePrice = $request->json();

        $book = $bookshop->books()->find($ISBN);
        return view ('bookshops.price')->with('book',$book)->with('onlinePrice',$onlinePrice)->with('bookshopID',$bookshop->id);
    }

    private function getURL($bookshopName){
        $URL = null;
        if($bookshopName != null){
            if ($bookshopName == "Librería Don Quijote") {
                $URL = "libreriadonquijote";
            } elseif ($bookshopName == "Cúspide") {
                $URL = "cuspide";
            } elseif ($bookshopName == "BuscaLibre") {
                $URL = "buscalibre";
            } elseif ($bookshopName == "Tematika") {
                $URL = "tematika";
            }
        }
        return $URL;
    }

    private function callAPI($bookshopReference, $ISBN){
        $APIUrl = env('SCRAPPING_API');
        return HTTP::get($APIUrl.'/'.$bookshopReference.'/'.$ISBN);
    }

    public function updatePrice(Request $request, $id, $ISBN)
    {
        $request->validate([
            'price' => 'required|integer',
            'id' => 'integer',
            'ISBN' => 'integer'
        ]);


        $price = $request->get('price');

        $bookshop = Bookshop::find($id);
        if($bookshop==null)
            abort(404);

        $has = Has::find([$id, $ISBN])[0];
        $has->price = $price;
        $has->save();

        return redirect("/bookshops/".$bookshop->id);
    }
}
