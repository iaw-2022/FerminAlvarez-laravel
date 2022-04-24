<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\WrittenBy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('canSeeBooks')->only('index','show');
        $this->middleware('canManageBooks')->except('index','show');
    }
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

        if(Book::find($request->get('ISBN')) != null){
            return redirect("/books/create")->withErrors("Ya existe ese ISBN");
        }else



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
        if($book==null)
            abort(404);

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
        if($book==null)
            abort(404);

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
        $book = Book::find($id);
        if($book==null)
            abort(404);

        $book->ISBN = $request->get('ISBN');
        $book->name = $request->get('name');
        $book->publisher = $request->get('publisher');
        $book->total_pages = $request->get('total_pages');
        $book->published_at = $request->get('published_at');
        $book->category = $request->get('category');
        $book->image_link = $request->get('image_link');

        try{
            DB::beginTransaction();
            $book->save();
            $book->authors()->detach();

            $authors = $request->input('authors');
            foreach((array) $authors as $author){
                $written_by = new WrittenBy();
                $written_by->Author = $author;
                $written_by->ISBN = $book->ISBN;
                $written_by->save();
            }
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }


        return redirect("/books/".$book->ISBN);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $ISBN
     * @return \Illuminate\Http\Response
     */
    public function destroy($ISBN)
    {
        $book = Book::find($ISBN);
        if($book==null)
            abort(404);

        $book->delete();
        return redirect("/books");
    }
}
