<?php

namespace App\Http\Controllers;

use \App\Chat;
use \App\Chart;
use \Illuminate\Http\Request as Request;
//use \Illuminate\Support\Facades\Validator;

class ChatController extends Controller {

    public function index() {
        $urldata = ['urldata' => json_encode(Chat::data())];
        return view('chat', $urldata);
    }

    public function json() {
        return Chat::pages();
    }

    public function chartdata() {
        return Chart::data();
    }
    
    public function neweventstart() {
        return Chart::startdata();
    }
    
    public function piechartdata() {
        return Chart::piedata();
    }
    
    public function newevent(Request $request) {
        return Chart::eventdata($request);
    }
    
    public function sendmessage(Request $request) {
        return Chat::send($request);
    }

}
