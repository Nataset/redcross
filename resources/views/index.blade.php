@extends('layouts.main')

@section('content')
<div class="text-center mt-5">
    <img src="https://raw.githubusercontent.com/Nataset/redcross-pic/main/Bird1.jpg" alt="Bird1" class="object-contain h-80 w-full">
    <form action="{{ route('send-email') }}" method="post">
        @csrf
        <div>
            <input class="hidden " type="text" name="img-url" value="https://raw.githubusercontent.com/Nataset/redcross-pic/main/Bird1.jpg">
        </div>
        <div>
            <label>email</label>
            <input class="w-full text-xl block rounded-lg " type="text" name="email" placeholder="email" autocomplete="off">
        </div>
        <div>
            <label>body</label>
            <input class="w-full text-xl block rounded-lg " type="text" name="body" placeholder="body" autocomplete="off">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Sent</button>
    </form>
</div>
@endsection