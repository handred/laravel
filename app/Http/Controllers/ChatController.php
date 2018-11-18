<?php

namespace App\Http\Controllers;

use \App\Chat;
use \App\Chart;
use \Illuminate\Http\Request;
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
        return Chart::startdata();
    }
    
    public function neweventstart() {
        return Chart::data();
    }
    
    public function piechartdata() {
        return Chart::piedata();
    }
    
    public function newevent(\Illuminate\Http\Request $request) {
        return Chart::eventdata($request);
    }

}
