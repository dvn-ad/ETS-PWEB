<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::with(['author', 'publisher'])->paginate(10);
        return view('admin.books.index' , compact('books'));
    }

    public function create(){
        $authors = Author::orderBy('name')->get();
        $publishers = Publisher::orderBy('name')->get();
        return view('admin.books.create', compact('authors', 'publishers'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => ['required','string', 'max:255'],
            'description' => ['nullable','string'],
            'price' => ['required', 'numeric','min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'release_date' => ['nullable', 'date'],
            'author_id' => ['required','exists:authors,id'],
            'publisher_id' => ['required','exists:publishers,id'],
        ]);
        Book::create($data);
        return redirect()->route('books.index');
    }

    public function edit(Book $book){
        $authors = Author::orderBy('name')->get();
        $publishers = Publisher::orderBy('name')->get();
        return view('admin.books.edit', compact('book', 'authors', 'publishers'));
    }

    public function update(Request $request, Book $book){
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'release_date' => ['nullable', 'date'],
            'author_id' => ['required', 'exists:authors,id'],
            'publisher_id' => ['required', 'exists:publishers,id'],
        ]);

        $book->update($data);
        return redirect()->route('books.index');
    }

    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('books.index');
    }
}
