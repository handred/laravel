<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller {

    public function index() {
        $urldata = ['urldata' => json_encode(Chat::data())];
        return view('chat', $urldata);
    }
    
    public function json() {
        return Chat::pages();
//        $date = new Chat();
//        $date->name = date("Y-m-d H:i:s");
//        $date->time = time();
//        $date->save();
//        return Chat::getall();
    }

}
