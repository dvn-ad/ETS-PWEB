<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with(['author', 'publisher']);

        // Check if there's a search query
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $searchType = $request->search_type ?? 'name';

            if ($searchType === 'id') {
                // Search by ID (exact match)
                $query->where('id', $searchTerm);
            } else {
                // Search by name (partial match, case-insensitive)
                $query->where('title', 'LIKE', '%' . $searchTerm . '%');
            }
        }

        $books = $query->latest()->get();
        
        return view('books.index', compact('books'));
    }
}
