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
    
    static function startdata() {
        return array(
            'labels' => ['Апрель', 'Май', 'Июнь', 'Июль'],
            'datasets' => [
                [
                    'label' => 'Продажи 1', 
                    'backgroundColor' => 'rgba(255,0,0,0.5)', 
                    'data' => [2345, 1111, 5555, 1345]],
        ]);
    }
    
     static function piedata() {
        return array(
            'labels' => ['Апрель', 'Май', 'Июнь', 'Июль'],
            'datasets' => [
                ['label' => 'Продажи 1', 
                    'backgroundColor' => [
                        'rgba(255,40,40,0.5)',
                        'rgba(255,250,0,0.5)',
                        'rgba(255,0,250,0.5)',
                        'rgba(205,100,0,0.5)'], 
                    'data' => self::rand()],
                ['label' => 'Продажи 2', 
                    'backgroundColor' => [
                        'rgba(255,40,40,0.5)',
                        'rgba(255,250,0,0.5)',
                        'rgba(255,0,250,0.5)',
                        'rgba(205,100,0,0.5)'], 
                    'data' => self::rand()],
                ['label' => 'Продажи 3', 
                    'backgroundColor' => [
                        'rgba(255,40,40,0.5)',
                        'rgba(255,250,0,0.5)',
                        'rgba(255,0,250,0.5)',
                        'rgba(205,100,0,0.5)'], 
                    'data' => self::rand()],

        ]);
    }
    
    static function eventdata($request) {
        $result = self::startdata();
        if($request->has('label')){
            $result['labels'][] = $request->input('label');
            $result['datasets'][0][] = $request->input('sale');
        }
        
        if($request->has('realtime') && $request->input('realtime') == 'true' ){
            //
        }
        return $result;
    }

}
