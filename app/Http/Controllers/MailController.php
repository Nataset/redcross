<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\Postcard;

class MailController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function send(Request $req)
    {
        $details = [
            'img-url' => $req->input('img-url'),
            'body' => $req->input('body')
        ];

        Mail::to($req->input('email'))->send(new Postcard($details));
        return "Email Send";
    }
}
