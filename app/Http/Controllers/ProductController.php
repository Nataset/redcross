<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::get();
        return Redirect::to('/dashboard/products');
    }

    public function product($name)
    {
        $product = Product::findOrFail( $name );

        $timestamps = $product->timestamps;

        $product->increment('amount');

        $product->timestamps = false;

        $product->save();
        $product->timestamps = $timestamps;

        return Redirect::to('/dashbord/products/' . $name);
    }
}
