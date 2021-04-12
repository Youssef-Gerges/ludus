<?php

namespace App\Http\Controllers;

use App\Http\Requests\addReviewRequest;
use App\Models\Review;
use Session;

class reviewsController extends Controller
{
    public function add(addReviewRequest $request)
    {
        $review = new Review();
        $review->content = $request->feedback;
        $review->stars = $request->rating;
        $review->product_id = $request->product_id;
        $review->user_id = $request->user()->id;
        $review->save();
        Session::flash('status', 'Thanks for your feedback');
        return redirect()->back();
    }
}
