<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $authors = Author::withCount('books')->paginate(10);
        return view('admin.authors.index', compact('authors'));
    }

    public function create(){
        return view('admin.authors.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Author::create($data);

        return redirect()->route('authors.index');
    }

    public function edit(Author $author){
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author){
        $data = $request->validate([
            'name'=>['required', 'string', 'max:255'],
        ]);

        $author->update($data);

        return redirect()->route('authors.index');
    }

    public function destroy(Author $author){
        //cek kalo author punya buku
        // if ($author->books()->count() > 0) {
        //     return redirect()->route('authors.index'); 
        // }

        $author->delete();
        return redirect()->route('authors.index');
    }
}
