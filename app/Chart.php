<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
//use App\Page;

class Chart {

    static function rand() {
        return [rand(1, 3000), rand(1, 3000), rand(1, 3000), rand(1, 3000)];
    }

    static function data() {
        return array(
            'labels' => ['Апрель', 'Май', 'Июнь', 'Июль'],
            'datasets' => [
                ['label' => 'Продажи 1', 'backgroundColor' => 'rgba(255,0,0,0.5)', 'data' => self::rand()],
                ['label' => 'Продажи 2', 'backgroundColor' => 'rgba(255,200,0,0.5)', 'data' => self::rand()],
                ['label' => 'Продажи 3', 'backgroundColor' => 'rgba(55,0,200,0.5)', 'data' => self::rand()],
        ]);
    }

}
