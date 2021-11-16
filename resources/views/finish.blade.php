@extends('layouts.main')

@section('style')
<style>


    .text-prompt-sm {
        font-family: 'Prompt', sans-serif;
        font-weight: 300;
    }

    .text-prompt-lg {
        font-family: 'Prompt', sans-serif;
        font-weight: 600;
    }
</style>

@endsection

@section('content')
<div class="flex justify-center items-center h-screen m-3">
    <div class="flex justify-center bg-yellow-50  border rounded-lg flex-col p-5 sm:p-10 shadow-lg">
        <div class="flex justify-center">
            <img src="https://raw.githubusercontent.com/Nataset/redcross-pic/main/check_logo.png" class="sm:w-1/2 w-1/2">
        </div>
        <div class="flex justify-center mt-3">
            <p class="text-prompt-sm sm:text-xl">คุณได้ส่งต่อประสบการณ์ความสนุกให้ </p>
        </div>

        <div class="flex justify-center">
            <p class="text-prompt-lg  sm:text-xl">{{$receiveName}}</p>
        </div>

        <div class="flex justify-center mt-3 sm:text-sm">
            <button class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 border border-blue-700 rounded sm:text-xl">
                กลับเข้าสู่งานนิทรรศการ
            </button>
        </div>
    </div>
</div>
@endsection
