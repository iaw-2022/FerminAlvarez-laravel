<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshop;
use App\Models\Has;
use Illuminate\Http\Request;

class BookshopController extends Controller
{
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
            'latitude' => 'nullable|numeric',
            'latitude' => 'nullable|numeric',
            'prices.*' => 'gt:0'
        ]);


        $bookshop = new Bookshop();
        $bookshop->name = $request->get('name');
        $bookshop->city = $request->get('city');
        $bookshop->latitude = $request->get('latitude');
        $bookshop->longitude = $request->get('longitude');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
