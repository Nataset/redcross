@extends('layouts.main')
@section('content')
<fieldset>
    <legend>Edit Product</legend>
<form action="{{route('confirmEditProduct' , ['id' => $product->id] )}}" method="post">
    @csrf
    @method('PUT')
    <div>
        <label for="name" >Product name</label>
        <input type="text" name="product_name"
        autocomplete="off" placeholder="name"
        value="{{$product->product_name}}">
        @error('name')
        <div style="color:red">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <label for="url">Product url</label>
        <input type="text" name="product_url"
        autocomplete="off" placeholder="url"
        value="{{$product->product_url}}">
    </div>
    @error('url')
        <div style="color:red">
            {{ $message }}
        </div>
    @enderror

    <div>
        <button type="submit">Edit Product</button>
    </div>



</form>
</fieldset>
@endsection
