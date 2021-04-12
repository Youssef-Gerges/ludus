<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Review;
use Cart;
use Illuminate\Http\Request;

class baseController extends Controller
{
    public function __invoke($page)
    {
        return view('user.static_pages.' . $page);
    }

    public function index()
    {
        $data = [
            'featured_categories' => Category::where('featured', true)->limit(3)->get(),
            'recent_products'     => Product::orderBy('created_at', 'desc')->limit(8)->get(),
            'recent_brands'     => Brand::orderBy('created_at', 'desc')->limit(4)->get(),
        ];
        return view('user.index', $data);
    }


    public function shop(Request $request)
    {
        switch ($request->sort) {
            case 'date':
                $sortBy = 'created_at';
                $sortAs = 'desc';
                break;
            case 'sortInv':
                $sortBy = 'created_at';
                $sortAs = 'asc';
                break;
            case 'lowestPrice':
                $sortBy = 'price';
                $sortAs = 'asc';
                break;
            case 'higePrice':
                $sortBy = 'price';
                $sortAs = 'desc';
                break;
            default:
                $sortBy = 'created_at';
                $sortAs = 'desc';
        }

        $categories = Category::all();
        $products = null;

        if ($request->__isset('brand')) {
            $products = Brand::findOrFail(request()->brand)->products()->orderBy($sortBy, $sortAs)->paginate(12);
        }

        if ($request->__isset('search')) {
            $products = Product::where('name', 'like', '%' . request()->search . '%')->orderBy($sortBy, $sortAs)->paginate(12);
        }

        if (request()->__isset('category')) {
            $products = Category::findOrFail(request()->category)->products()->orderBy($sortBy, $sortAs)->paginate(12);
        }

        if (request()->__isset('min') && request()->__isset('max')) {
            if ($products == null) {
                $products = Product::whereBetween('price', [request()->min, request()->max])->orderBy($sortBy, $sortAs)->paginate(12);
            } else {
                $products = $products->whereBetween('price', [request()->min, request()->max])->orderBy($sortBy, $sortAs)->paginate(12);
            }
        }

        $data = [
            'categories' => $categories,
            'products' => $products
        ];

        return view('user.shop.main_shop', $data);
    }

    public function singleProduct(Product $product)
    {
        $wish = false;
        $reviewed = false;

        if (request()->user()) {
            Cart::instance('wishlist')->recover(request()->user()->id);
            $item = Cart::instance('wishlist')->search(function ($cartItem, $rowId) {
                return $cartItem->id == request()->product->id;
            });
            if ($item->count() > 0) {
                $wish = true;
            }
            $review = Review::whereUser_id(request()->user()->id)->whereProduct_id($product->id)->count();
            if ($review > 0) {
                $reviewed = true;
            }
        }
        $reviews = Review::get(['stars', 'product_id'])
            ->groupBy('product_id')
            ->sortByDesc(function ($rows) {
                return $rows->count('stars');
            })
            ->take(6);

        $varities = $product->varities->where('stock', '>', 0)->groupBy('type');

        $data = [
            'product' => $product,
            'rating' => $product->getRateAttribute(),
            'top_reviewed' => $reviews,
            'varities' => $varities,
            'wish' => $wish,
            'reviewed' => $reviewed
        ];
        return view('user.shop.single_product', $data);
    }
}
