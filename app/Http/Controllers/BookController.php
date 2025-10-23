<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['author', 'publisher']);

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $searchType = $request->search_type ?? 'title';

            if ($searchType === 'id') {
                //search  id (harus sama)
                $query->where('id', $searchTerm);
            } elseif ($searchType === 'title') {
                //book title pakai 'like'
                $query->where('title', 'LIKE', '%' . $searchTerm . '%');
            } elseif ($searchType === 'publisher') {
                //search publishers
                $query->whereHas('publisher', function($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                });
            } elseif ($searchType === 'author') {
                //authors
                $query->whereHas('author', function($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', '%' . $searchTerm . '%');
                });
            }
        }

        $books = $query->latest()->get();
        
        return view('books.index', compact('books'));
    }
}
