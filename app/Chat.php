<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Page;

class Chat extends Model {
    
    const eeee = '7dfgdgf';

    static function data() {
        return ['ffff'=> self::eeee, 'test1' => 'test1-text', 'test2' => 'test2-text', 'test3' => 'test3-text'];
    }
    
   static function pages() {
        return Page::all(['id', 'name']);
    }
}
