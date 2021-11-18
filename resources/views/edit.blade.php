@extends('layouts.main')
@section('content')
    <fieldset class="m-20 border-2 pl-3 border-gray-600">
        <legend class="text-3xl font-semibold"> Edit Product </legend>
        <form action="{{ route('confirmEditProduct', ['id' => $product->id]) }}" method="post"
            class="mx-auto px-6  space-y-6">
            @csrf
            @method('PUT')
            <div class="text-xl">
                <label for="name">Product name : </label>
                <input type="text" name="product_name" autocomplete="off" placeholder="name" class="rounded-lg"
                    value="{{ old('product_name', $product->product_name) }}">
                @error('name')
                    <div style="color:red">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="text-xl">
                <label for="url">Product url : </label>
                <input type="text" name="product_url" autocomplete="off" placeholder="url" class="rounded-lg"
                    value="{{ old('product_url', $product->product_url) }}">
            </div>
            @error('url')
                <div style="color:red">
                    {{ $message }}
                </div>
            @enderror

            <div class="text-xl">
                <button type="submit" onclick="return confirm('ยืนยันการเปลี่ยนแปลง')"
                    class="bg-blue-500 mb-4  hover:bg-blue-700 text-white font-bold py-2 px-8 rounded "> Edit
                    Product</button>
            </div>
        </form>
</fieldset> @endsection
