<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    //

    public function index()
    {
        $reviews = Review::all();
        return view('review.index', compact('reviews'));
    }


    public function create()
    {
        return view('review.create');
    }


    public function store(Request $request)
    {
    $review = new Review();
    $review->user_id = auth()->id();
    $review->content = $request->content;
    $review->rating = $request->rating;
    $review->save();

    return redirect()->route('review.index');
    }
}


