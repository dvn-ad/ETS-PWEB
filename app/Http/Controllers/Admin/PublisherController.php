<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::withCount('books')->paginate(10);
        return view('admin.publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('admin.publishers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Publisher::create($data);

        return redirect()->route('publishers.index');
    }

    public function edit(Publisher $publisher)
    {
        return view('admin.publishers.edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $publisher->update($data);

        return redirect()->route('publishers.index');
    }

    public function destroy(Publisher $publisher)
    {
        // cek if publisher punya buku
        // if ($publisher->books()->count() > 0) {
        //     return redirect()->route('publishers.index');
        // }

        $publisher->delete();
        return redirect()->route('publishers.index');
    }
}
