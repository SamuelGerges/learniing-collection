<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function average()
    {
        $data = [
            ['price' => 5000, 'tax' => 5000, 'active' => true],
            ['price' => 6000, 'tax' => 5000, 'active' => false],
            ['price' => 8000, 'tax' => 5000, 'active' => true],
            ['price' => 9000, 'tax' => 5000, 'active' => true],
        ];

//        $res =  collect($data)->average('price');
        $res = collect($data)->average(function ($value) {

            if(!$value['active']){
                return null;
            }
            return $value['price'] + $value['tax'];
        });
        dd($res);

    }
}
