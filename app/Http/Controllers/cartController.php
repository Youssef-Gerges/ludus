<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Session;

class cartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('cart')->content();
        return view('user.lists.cart', ['items' => $items]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        $options = [];
        foreach ($request->all() as $key => $value) {
            if (str_contains($key, 'option_')) {
                array_push($options, $request->input($key));
            }
        }
        $price = $product->price;
        if ($product->getActiveDiscountAttribute()->count() > 0) {
            $price = (floatval($product->getActiveDiscountAttribute()->first()->value) * floatval($price));
        }
        Cart::instance('cart')->add($product->id, $product->name, $request->count, $price, options: $options);
        Session::flash('status', 'added to cart successfully');
        return redirect()->back();
    }

    public function editCart(Request $request)
    {
        foreach ($request->all() as $row => $value) {
            if (str_contains($row, 'row_')) {
                Cart::instance('cart')->update(explode('row_', $row)[1], $value);
            }
        }
        return redirect()->route('cart.view');
    }


    public function destroyCart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.view');
    }

    public function removeFromCart(Request $request)
    {
        Cart::instance('cart')->remove($request->rowId);
        return redirect()->route('cart.view');
    }
}
