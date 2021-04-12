<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Session;

class wishController extends Controller
{

    public function index()
    {
        /*
        Cart::instance('wishlist')->restore(request()->user()->id);
        Cart::instance('wishlist')->add(1, 'fdsf', 10, 100);
        Cart::instance('wishlist')->store(request()->user()->id);
        Cart::instance('wishlist')->destroy();
        */
        Cart::instance('wishlist')->recover(request()->user()->id);
        $items = Cart::instance('wishlist')->content();

        return view('user.lists.wishlist', ['items' => $items]);
    }

    public function addToWish(Request $request)
    {
        $product = Product::find($request->product_id);
        Cart::instance('wishlist')->restore(request()->user()->id);
        Cart::instance('wishlist')->add($product->id, $product->name, 1, $product->price);
        Cart::instance('wishlist')->store(request()->user()->id);
        Session::flash('status', 'added to wishlist successfully');
        return redirect()->back();
        //return 'ok';
    }

    public function destroyWish()
    {
        Cart::instance('wishlist')->erase(request()->user()->id);
        Cart::instance('wishlist')->destroy();
        return redirect()->route('wish.view');
    }

    public function removeFromWish(Request $request)
    {
        Cart::instance('wishlist')->restore(request()->user()->id);
        Cart::instance('wishlist')->remove($request->rowId);
        Cart::instance('wishlist')->store(request()->user()->id);
        return redirect()->route('wish.view');
    }

}
