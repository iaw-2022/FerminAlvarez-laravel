<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\WrittenBy;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $authors = Author::all();

        return view('books.index', compact('books','authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view ('books.create') -> with('authors',$authors);
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
            'ISBN' => 'required|integer',
            'name' => 'required|max:255',
            'publisher' => 'required|max:255',
            'total_pages' => 'integer',
            'published_at' => 'nullable|date',
            'category' => 'max:255',
            'image' => ''
        ]);

        $book = new Book();
        $book->ISBN = $request->get('ISBN');
        $book->name = $request->get('name');
        $book->publisher = $request->get('publisher');
        $book->total_pages = $request->get('total_pages');
        $book->published_at = $request->get('published_at');
        $book->category = $request->get('category');
        $book->image_link = $request->get('image_link');

        $book->save();

        $authors = $request->input('author');

        foreach((array) $authors as $author){
            $written_by = new WrittenBy();
            $written_by->Author = $author;
            $written_by->ISBN = $book->ISBN;
            $written_by->save();
        }


        return redirect("/books");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $authors = Author::All();
        return view('books.edit')->with('book',$book)->with('authors',$authors);
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
            'ISBN' => 'required|integer',
            'name' => 'required|max:255',
            'publisher' => 'required|max:255',
            'total_pages' => 'integer',
            'published_at' => 'nullable|date',
            'category' => 'max:255',
            'image' => ''
        ]);

        $book = Book::find($request->ISBN);
        $request->get('ISBN');
        $book->ISBN = $request->get('ISBN');
        $book->name = $request->get('name');
        $book->publisher = $request->get('publisher');
        $book->total_pages = $request->get('total_pages');
        $book->published_at = $request->get('published_at');
        $book->category = $request->get('category');
        $book->image_link = $request->get('image_link');
        $book->save();

        $book->authors()->detach();

        $authors = $request->input('authors');
        foreach((array) $authors as $author){
            $written_by = new WrittenBy();
            $written_by->Author = $author;
            $written_by->ISBN = $book->ISBN;
            $written_by->save();
        }

        return redirect("/book/".$book->ISBN);
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
