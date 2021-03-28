<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
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
        $books = Book::paginate(1);
        return response()-> json($books,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()-> validate([
            'name' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'publication_date' => 'required',

        ]);
    
        return Book::create([
            'name' => request('name'),
            'author' => request('author'),
            'category_id' => request('category_id'),
            'publication_date' => request('publication_date'),
            'image' => request('image'),

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Book::findOrFail($id);
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
    public function update(Book $book)
    {
        request()-> validate([
            'name' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'publication_date' => 'required',

        ]);
    
        $success = $book->update([
            'name' => request('name'),
            'author' => request('author'),
            'category_id' => request('category_id'),
            'publication_date' => request('publication_date'),
            'user_id' => request('user_id'),
            'image' => request('image'),
        ]);
    
        return [
            'success' => $success
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $success = $book->delete();
        return [
            'succes' => $success
        ];
    }
}
