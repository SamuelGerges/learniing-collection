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

            if (!$value['active']) {
                return null;
            }
            return $value['price'] + $value['tax'];
        });
        dd($res);

    }

    public function maximum()
    {
        $data = [
            ['price' => 5000, 'tax' => 5000, 'active' => true],
            ['price' => 6000, 'tax' => 4000, 'active' => false],
            ['price' => 8000, 'tax' => 6000, 'active' => true],
            ['price' => 9000, 'tax' => 9000, 'active' => true],
        ];

//        $res =  collect($data)->max('price');
        $res = collect($data)->max(function ($value) {

            if (!$value['active']) {
                return null;
            }
            return $value['price'] + $value['tax'];
        });
        dd($res);

    }

    public function median()
    {
        $data = [
            ['price' => 18000, 'tax' => 5000, 'active' => true],
            ['price' => 25000, 'tax' => 4000, 'active' => false],
            ['price' => 30000, 'tax' => 6000, 'active' => true],
            ['price' => 40000, 'tax' => 8000, 'active' => true],
//            ['price' => 9000, 'tax' => 9000, 'active' => true],
//            ['price' => 10000, 'tax' => 10000, 'active' => true],
        ];

        $res = collect($data)->median('price');
//        $res = collect($data)->median(function ($value) {
//            if (!$value['active']) {
//                return null;
//            }
//            return $value['price'] + $value['tax'];
//        });
        dd($res);

    }
}
