<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::get();
        return Redirect::to('/dashboard/products');
    }

    public function product($id)
    {
        $product = Product::findOrFail( $id );

        $timestamps = $product->timestamps;

        $product->increment('click_amount');

        $product->timestamps = false;

        $product->save();
        $product->timestamps = $timestamps;

        return redirect()->away('https://www.google.com');
        // return redirect()->away($product->product_url);
    }

    public function editUrl(Request $request , $id)
    {
        $product = Product::findOrFail( $id );

        if($request->product_url !== null){
            $product->product_url = $request->product_url;
        }

        $product->save();
        return redirect()->intended(RouteServiceProvider::HOME)->with("message" , "edited");

    }
}
