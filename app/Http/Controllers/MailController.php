<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\Postcard;

class MailController extends Controller
{
    public $img_endpoint = 'https://raw.githubusercontent.com/Nataset/redcross-pic/main/';

    public $img_name = [
        'bird' => array('Bird1.jpg', 'Bird2.jpg', 'Bird3.jpg', 'Bird4.jpg'),
        'postcard' => array('Postcard1.jpg', 'Postcard2.jpg', 'Postcard3.jpg', 'Postcard4.jpg'),
        'land' => array('Land1.png', 'Land2.png', 'Land3.png', 'Land4.png')
    ];

    public function index($type, $id)
    {
        $img_path = $this->img_endpoint . $this->img_name[$type][$id - 1];
        return view('index', ['imgUrl' => $img_path]);
    }

    public function send(Request $req)
    {
        $details = [
            'img-url' => $req->input('img-url'),
            'senderName' => $req->input('senderName'),
            'body' => $req->input('body'),
            'toEmail' => $req->input('toEmail'),
            'receiveName' => $req->input('receiveName')

        ];

        Mail::to($req->input('toEmail'))->send(new Postcard($details));
        return "Email Send";
    }
}
