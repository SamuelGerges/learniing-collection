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

    public function minimum()
    {
//        $data = [200, 300, 400, 5000];
//        dd(collect($data)->min());

        $data = [
            ['price' => 18000, 'tax' => 5000, 'active' => false],
            ['price' => 25000, 'tax' => 4000, 'active' => false],
            ['price' => 30000, 'tax' => 6000, 'active' => true],
            ['price' => 40000, 'tax' => 500, 'active' => true],
        ];

        $res = collect($data)->min(function ($value) {
            if (!$value['active']) {
                return null;
            }
            return $value['price'] + $value['tax'];
        });
        dd($res);

    }

    public function collapsee()
    {

        // TODO :: collapse return values into a single array

//        $data = [
//            [1, 2, 3, 4],
//            [5, 6, 7, 8],
//            [9, 10, 11, 12],
//        ];
//        dd(collect($data)->collapse());

        $data = [
            [0 => 'samuel'],
            [1 => 'gerges'],
            [2 => 'mina'],
        ];
        dd(collect($data)->collapse()->first());
//        dd(collect($data)->collapse()->last());
//        dd(collect($data)->collapse());


    }

    public function chunks()
    {

        // TODO :: chunk(size) return collection into a other collection (size) => number of elements in collection

        $data = [
            1, 2, 3, 4, 5, 6, 7, 8


        ];
//        dd(collect($data)->chunk(4)->first());
//        dd(collect($data)->chunk(4)->last());

        $data = [
            [0 => 'samuel'],
            [1 => 'gerges'],
            [2 => 'mina'],
            [3 => 'family'],
        ];
        dd(collect($data)->chunk(2));


    }
}
