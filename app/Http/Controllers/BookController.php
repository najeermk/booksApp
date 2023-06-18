<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        return response()->json([
            'books' => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booksData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_date' => 'required',
            'description' => 'required'
        ]);

        $booksData['title'] = strip_tags($booksData['title']);
        $booksData['author'] = strip_tags($booksData['author']);
        $booksData['publication_date'] = strip_tags($booksData['publication_date']);
        $booksData['description'] = strip_tags($booksData['description']);

        $book = Book::create($booksData);
        
        return response()->json([
            'message' => 'Book created successfully',
            'book' => $book
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response()->json([
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $booksData = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_date' => 'required',
            'description' => 'required'
        ]);

        $booksData['title'] = strip_tags($booksData['title']);
        $booksData['author'] = strip_tags($booksData['author']);
        $booksData['publication_date'] = strip_tags($booksData['publication_date']);
        $booksData['description'] = strip_tags($booksData['description']);

        $book->update($booksData);
        
        return response()->json([
            'message' => 'Book updated successfully',
            'book' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'message' => 'Book has been deleted'
        ]);
    }
}
