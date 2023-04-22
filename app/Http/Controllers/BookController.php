<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        if (request()->wantsJson()) {
            return response()->json($books);
        }
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required',
            'name' => 'required',
            'author' => 'required',
            'release_date' => ['required', 'integer'],
        ]);

        $book = Book::create($request->all());
        if (request()->wantsJson()) {
            return response()->json($book);
        }
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (request()->wantsJson()) {
            $book = Book::where('isbn', $id)->first();
            return response()->json($book);
        }
        $book = Book::where('id', $id)->first();
        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'isbn' => 'required',
            'name' => 'required',
            'author' => 'required',
            'release_date' => ['required', 'integer']
        ]);

        $attributes = $request->only(['isbn', 'name', 'author', 'release_date']);

        if (request()->route()->named('api.*') || request()->wantsJson()) {
            $book = Book::where('isbn', $id)->first();
            $book->update(array_filter($attributes));
            return response()->json($book);
        }

        $book = Book::where('id', $id)->first();
        $book->update(array_filter($attributes));
        return redirect()->route('books.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (request()->route()->named('api.*') || request()->wantsJson()) {
            $book = Book::where('isbn', $id)->first();
            $book->delete();
            return response()->json(['success' => true]);
        } else {
            $book = Book::where('id', $id)->first();
            $book->delete();
            return redirect()->route('books.index');
        }
    }
}
