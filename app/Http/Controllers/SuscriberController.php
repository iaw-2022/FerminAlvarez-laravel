<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Suscribed;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SuscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('canSeeSuscribers')->only('index','show');
        $this->middleware('canManageSuscribers')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suscribers = User::all()->where('role',3);
        return view('suscribers.index')->with('suscribers',$suscribers);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $suscriber = User::find($id);
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
        $suscriber = User::find($id);
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
        $suscriber = User::find($id);
        if($suscriber==null)
            abort(404);

        try{
            $suscriber->save();
            $books = $request->input('books');

            $suscriber->books()->detach();
            foreach((array) $books as $book){
                $suscribed = new Suscribed();
                $suscribed->id_user = $suscriber->id;
                $suscribed->ISBN = $book;
                $suscribed->save();
            }
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
        return redirect("/suscribers/".$suscriber->id);
    }
}
