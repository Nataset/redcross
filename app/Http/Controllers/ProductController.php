<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::get();
        return view('dashboard', ['products' => $product]);
    }

    public function product($id)
    {
        $product = Product::findOrFail($id);

        if (!$product->product_url) {
            return abort(404);
        }

        $timestamps = $product->timestamps;

        $product->increment('click_amount');

        $product->timestamps = false;

        $product->save();
        $product->timestamps = $timestamps;

        return redirect()->away($product->product_url);
    }

    public function confirmEditProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->product_name = $request->input('product_name');
        $product->product_url = $request->input('product_url');


        $product->save();
        return redirect()->intended(RouteServiceProvider::HOME)->with("message", "Edited product's details successfully!");
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('edit', ['product' => $product]);
    }

    public function add()
    {
        return view('add');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required|string|min:3',
            'url' => 'required|string',
        ]);

        $validator->validated();

        $product = new Product;
        $product->product_name = $req->input('name');
        $product->product_url = $req->input('url');

        $product->save();
        return redirect()->to('/dashboard');
    }
}
