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
            $suscribed->email = $suscriber->email;
            $suscribed->ISBN = $book;
            $suscribed->save();
        }

        return redirect("/suscribers");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $email
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $suscriber = Suscriber::find($email);
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
