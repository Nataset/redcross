<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\MainRequest;
use App\Mail\Postcard;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    private $img_endpoint = 'https://raw.githubusercontent.com/Nataset/redcross-pic/main/';
    private $img_twitter_endpoint = 'pic.twitter.com/';

    private $img_name = [
        'bird' => array('Bird1.jpg', 'Bird2.jpg', 'Bird3.jpg', 'Bird4.jpg'),
        'postcard' => array('Postcard1.jpg', 'Postcard2.jpg', 'Postcard3.jpg', 'Postcard4.jpg'),
        'land' => array('Land1.png', 'Land2.png', 'Land3.png', 'Land4.png')
    ];
    private $img_twitter = [
        'bird' => array('t9DW5obXND', 'Y9DZRn9PZf', 'FLScXk4hIO', 'KONZ6bEZDd'),
        'postcard' => array('Postcard1.jpg', '7QJq1i7Ght', '46a4WkdJmT', 'H87XiBvF4I'),
        'land' => array('kZcxIW3GWe', 'BixiZBGw6L', 'Yz95mwFmr8', 'zxnNG40BwL')
    ];

    public function index($type, $id)
    {
        $img_path = $this->img_endpoint . $this->img_name[$type][$id - 1];
        $img_twitter_path = $this->img_twitter_endpoint . $this->img_twitter[$type][$id-1];
        return view('index', [
            'imgUrl' => $img_path,
            'twitterUrl' => $img_twitter_path
        ]);
    }

    public function send(Request $req)
    {

        $validator = Validator::make(
            $req->all(),
            [
                'img-url' => 'required',
                'senderName' => 'required',
                'body' => 'required',
                'toEmail' => 'required|email',
                'receiveName' => 'required'
            ],
            [
                'img-url.required' => 'กรุณาเลือกรูปภาพ',
                'senderName.required' => 'กรุณากรอกชื่อของคุณ',
                'body.required' => 'กรุณากรอกคำอวยพร',
                'toEmail.required' => 'กรุณากรอกอีเมล',
                'toEmail.email' => 'รูปแบบอีเมลให้ถูกต้อง',
                'receiveName.required' => 'กรุณากรอกชื่อผู้รับ',
            ]
        );
        $validator->validated();

        $details = [
            'img-url' => $req->input('img-url'),
            'toEmail' => $req->input('toEmail'),
            'body' => $req->input('body'),
            'senderName' => $req->input('senderName'),
            'receiveName' => $req->input('receiveName')

        ];

        Mail::to($req->input('toEmail'))->send(new Postcard($details));
        return view('finish', [
            'toEmail' => $details['toEmail'],
            'receiveName' => $details['receiveName']
        ]);
        // return "Email Send to " . $req->input('toEmail');
    }
}
