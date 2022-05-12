<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('canSeeCategories')->only('index','show');
        $this->middleware('canManageCategories')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('categories.create');
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
            'category' => 'required|max:255',
        ]);


        $category = new Category();
        $category->name = $request->input('category');
        $category->save();

        return redirect("/categories");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if($category==null)
            abort(404);

        $books = $category->books();
        return view('categories.show')->with('category',$category)->with('books',$books);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if($category==null)
            abort(404);

        $roles = Role::all();
        return view('categories.edit')->with('category',$category);
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
            'category' => 'required|max:255'
        ]);


        $category = Category::find($id);
        $category->name = $request->input('category');
        $category->save();

        return redirect("/categories");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category==null)
            abort(404);

        try{
            $category->delete();
        }catch(\Exception $e){
            return redirect("/categories/".$category->id)->withErrors("No se pudo eliminar la categoría, primero debe eliminar los libros a los que pertenece o quitarla.");
        }
        return redirect("/categories");
    }
}
