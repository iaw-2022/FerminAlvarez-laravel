<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Suscribed;
use Illuminate\Http\Request;
use App\Models\Suscriber;

class SuscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suscribers = Suscriber::all();
        return view('suscribers.index')->with('suscribers',$suscribers);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        return view ('suscribers.create') -> with('books',$books);
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
            'email' => 'required|max:255'
        ]);

        $suscriber = new Suscriber();
        $suscriber->email = $request->get('email');
        $suscriber->save();

        $books = $request->input('books');

        foreach((array) $books as $book){
            $suscribed = new Suscribed();
            $suscribed->id_suscriber = $suscriber->id;
            $suscribed->ISBN = $book;
            $suscribed->save();
        }

        return redirect("/suscribers");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suscriber = Suscriber::find($id);
        if($suscriber==null)
            abort(404);

        return view('suscribers.show', compact('suscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suscriber = Suscriber::find($id);
        if($suscriber==null)
            abort(404);

        $books = Book::All();
        return view('suscribers.edit')->with('suscriber',$suscriber)->with('books',$books);
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
            'email' => 'required|max:255'
        ]);

        $suscriber = Suscriber::find($id);
        if($suscriber==null)
            abort(404);

        $suscriber->email = $request->get('email');
        $suscriber->save();

        $books = $request->input('books');

        $suscriber->books()->detach();
        foreach((array) $books as $book){
            $suscribed = new Suscribed();
            $suscribed->id_suscriber = $suscriber->id;
            $suscribed->ISBN = $book;
            $suscribed->save();
        }


        return redirect("/suscribers/".$suscriber->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suscriber = Suscriber::find($id);
        if($suscriber==null)
            abort(404);

        $suscriber->delete();
        return redirect("/suscribers");
    }
}
