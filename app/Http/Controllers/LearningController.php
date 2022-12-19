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

    public function combine()
    {
        // TODO:: combine => create a new collection by using this collection for keys and another for its values.

        $key = collect(['fruits', 'drinks']);
//           $data = $key->combine(['fruits', 'meats', 'eggs']);
        $data = $key->combine([
            [
                0 => 'apples',
                1 => 'banana',
                2 => 'oranges'
            ],
            [
                0 => 'pespaa',
                1 => 'cocala',
                2 => 'jejejej'
            ]
        ]);
        dd($data);

    }

    public function concat()
    {
        // TODO:: Push all of the given items onto the collection.
        $data = collect('one element');
//        $result =  $data->concat(['two element']);
        $result =  $data->concat(['zero' =>'two element']);  // key that is ignore   result ['one element','two element']
        dd($result);
    }

    public function contains()
    {
        // TODO:: contains  Determine if an item exists in the collection.   and return true or false
        // is chack is the variable is contain this value ? true : false

//        $data = collect([1])->contains(1);     // return  true
        $data = collect([1,2,4,5])->contains(8);   // retun false
        $data = collect([1,2,4,5])->containsStrict(2);   // retun false
        dd($data);
    }
}
