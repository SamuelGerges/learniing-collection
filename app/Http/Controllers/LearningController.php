<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
        // TODO :: Chunk the collection into chunks of the given size.

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
        $result = $data->concat(['two element', 'three element', 'four element']);  // key that is ignore   result ['one element','two element']
        dd($result);
    }

    public function contains()
    {
        // TODO:: contains  Determine if an item exists in the collection.   and return true or false
        // is chack is the variable is contain this value ? true : false

//        $data = collect([1])->contains(1);     // return  true
        $data = collect([1, 2, 4, 5])->contains(8);   // retun false
        $data = collect([1, 2, 4, 5])->containsStrict(2);   // retun false
        dd($data);
    }

    public function countCollection()
    {
        $data = [1,
            2 => ['a', 'b', 'c', 'd'],
            4, 5, 6, 5
        ];
        dd(($data));
        dd(collect($data[2])->count());
    }

    public function diff()
    {
        // TODO:: Get the items in the collection that are not existed in the given items.
//        $collection = collect([1, 2, 3]);
//        dd($collection->diff([2, 4, 6]));   // return  [1,3] in $collection to existed 2 in other collection
        $collection = collect([1 => 'aa', 2 => 'ab', 3 => 'ac']);
        dd($collection->diff([2 => 'ab', 4 => 'aa', 6]));   // retun [1 => 'aa' , 3 => 'ac']
    }

    public function diffAssoc()
    {
        // TODO:: Get the items in the collection whose keys and values are not present in the given items.
        // TODO :: keys == keys && values == values
        // TODO :: key => value  == key => value
        $collection = collect([1 => 'aa', 2 => 'ab', 3 => 'ac']);
        dd($collection->diffAssoc([2 => 'ab', 4 => 'aa', 6 => 'ad']));   // retun [3 => 'ac']
    }

    public function diffKeys()
    {
        // TODO:: Get the items in the collection whose keys are not present in the given items.
        // TODO :: keys === keys     ignore values
        $collection = collect([1 => 'aa', 2 => 'ab', 3 => 'ac']);
        dd($collection->diffKeys([2 => 'ab', 5 => 'aa', 4 => 'ad']));   // retun [1 => 'aa' , 3 => 'ac']
    }

    public function diffUsing()
    {
        // TODO:: Get the items in the collection that are not present in the given items, using the callback.
        $collection = collect([10, 25, 50]);
        return ($collection->diffUsing([.1, .25], function ($a, $b) {
            dump($b * 10);
        }));
    }

    public function cross_Join()
    {
        // TODO:: Cross join with the given lists, returning all possible permutations.
        $collection = collect([1, 2, 3]);
        dd($collection->crossJoin(['samuel', 'mina', 'gena']));
    }


    public function tab()
    {
        // TODO :: reverse item order
        $result = collect([1, 4, 3])->reverse()
            ->tap(function ($collection) {
                $collection->reverse()
                    ->each(function ($va) {
                        dump($va);
                    });
            });
        dd($result);
    }


    public function map()
    {
//        $resu = collect([1, 2, 4, 5])->map(function ($item, $key) {
//            return ($item * $key);
//        });
        $resu = collect(['name' => 'samuek', 'age' => '22'])
            ->map(function ($item, $key) {
                return ([$key . $item]);
            });
        dd($resu);
    }

    public function mapWithKeys()
    {
        $resu = collect(['firstName' => 'samuek', 'secondName' => 'gerges'])
            ->mapWithKeys(function ($item, $key) {
//                if ($key == 'name')
//                    return [];
//              return ([$key => $item]);
                return ([
                    $key => $item,
                    $key . '_upper' => strtoupper($item)
                ]);
                return ([$item => $key]);
            });
        dd($resu);
    }

    public function mapInto()
    {
        $res = collect([1, 2, 3, 4])->mapInto(Converter::class)
            ->map(function ($item) {
                return $item->toCentimetres();
            });
        dd($res);
    }

    public function mapSpread()
    {
        // TODO :: mapSpread Run a map over each nested chunk of items
//        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9])->chunk(2)
//            ->mapSpread(function ($a, $b) {
//                return $a * $b;
//            });
//        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9])->chunk(2)
//            ->mapSpread(function ($a, $b) {
//                return $a + $b;
//            });
//        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9])->chunk(3)
//            ->mapSpread(function ($a, $b,$c) {
//                return ($a * $b -$c);
//            });
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9])->chunk(3)
            ->mapSpread(function ($a, $b, $c) {
                return [$a * $b => $c];
            });
        dd($collection);
    }

    public function mapToDictionary()
    {
        // TODO :: mapToDictionary Run a dictionary map over the items.
        //The callback should return an associative array with a single key/value pair.
        $collection = collect([
            ['product' => 'apples', 'price' => 33],
            ['product' => 'apples', 'price' => 44],
            ['product' => 'bananas', 'price' => 55],
            ['product' => 'bananas', 'price' => 66],
        ]);

        dd($collection->mapToDictionary(function ($item) {
            return [$item['price'] => $item['price']];
        }));
    }

    public function mapToGroups()
    {
        // TODO :: mapGroups Run a grouping map over the items.
        //The callback should return an associative array with a single key/value pair
        $collection = collect([
            ['product' => 'apples', 'price' => 33],
            ['product' => 'apples', 'price' => 44],
            ['product' => 'bananas', 'price' => 55],
            ['product' => 'bananas', 'price' => 66],
        ]);

        dd($collection->mapToGroups(function ($item) {
            return [$item['product'] => $item['price']];
        })->map(function ($item) {
            return $item->max();
        })
        );
    }

    public function where()
    {
        // TODO :: where Filter items by the given key value pair.
//        $collection = collect([
//            ['product' => 'apples', 'price' => 33],
//            ['product' => 'apples', 'price' => 44],
//            ['product' => 'bananas', 'price' => 33],
//            ['product' => 'bananas', 'price' => 66],
//        ])->where('price', 33);

        $collection = collect([
            ['product' => 'apples', 'price' => 33],
            ['product' => 'apples', 'price' => 44],
            ['product' => 'bananas', 'price' => 33],
            ['product' => 'bananas', 'price' => 66],
        ])->where('price', '>', 33);
        dd($collection);

    }

    public function whereStrict()
    {
        // TODO :: whereStrict Filter items by the given key value pair using strict comparison.
//        $collection = collect([
//            ['product' => 'apples', 'price' => 33],
//            ['product' => 'apples', 'price' => 44],
//            ['product' => 'bananas', 'price' => 33],
//            ['product' => 'bananas', 'price' => 66],
//        ])->whereStrict('price', 33);
        $collection = collect([
            ['product' => 'apples', 'price' => 33],
            ['product' => 'apples', 'price' => 44],
            ['product' => 'bananas', 'price' => 33],
            ['product' => 'bananas', 'price' => 66],
        ])->where('price', '<>', 66);
        dd($collection);

    }

    public function whereInStrict()
    {
        // TODO :: whereInStrict Filter items by the given key value pair using strict comparison.
//
//        $collection = collect([
//            ['product' => 'apples', 'price' => 33],
//            ['product' => 'apples', 'price' => 44],
//            ['product' => 'bananas', 'price' => 40],
//            ['product' => 'bananas', 'price' => 66],
//        ])->whereInStrict('price', [33,40]);           //

        $collection = collect([
            ['product' => 'apples', 'price' => 33],
            ['product' => 'apples', 'price' => 44],
            ['product' => 'bananas', 'price' => 40],
            ['product' => 'bananas', 'price' => 66],
        ])->whereInStrict('price', ['33', '40']);             //  return empty array because the condition is not true
        dd($collection);
    }

    public function whereNotInStrict()
    {
        // TODO :: whereInStrict Filter items by the given key value pair using strict comparison.

//        $collection = collect([
//            ['product' => 'apples', 'price' => 33],
//            ['product' => 'apples', 'price' => 44],
//            ['product' => 'bananas', 'price' => 40],
//            ['product' => 'bananas', 'price' => 66],
//        ])->whereNotInStrict('price', [33,40]);           //

        $collection = collect([
            ['product' => 'apples', 'price' => 33],
            ['product' => 'apples', 'price' => 44],
            ['product' => 'bananas', 'price' => 40],
            ['product' => 'bananas', 'price' => 66],
        ])->whereNotInStrict('price', ['33', '40']);             //  return empty array because the condition is not true

        dd($collection);
    }

    public function whereIn()
    {
        // TODO :: whereIn Filter items by the given key value pair.

//        $collection = collect([
//            ['product' => 'apples', 'price' => 33],
//            ['product' => 'apples', 'price' => 44],
//            ['product' => 'bananas', 'price' => 40],
//            ['product' => 'bananas', 'price' => 66],
//        ])->whereIn('price', [33, 40]);

        $collection = collect([
            ['product' => 'apples', 'price' => 33],
            ['product' => 'apples', 'price' => 44],
            ['product' => 'bananas', 'price' => 40],
            ['product' => 'bananas', 'price' => 66],
        ])->whereIn('price', ['33', '40']);
        dd($collection);
    }

    public function whereNotIn()
    {
        // TODO :: whereNotIn  Filter items by the given key value pair.

        $collection = collect([
            ['product' => 'apples', 'price' => 33],
            ['product' => 'apples', 'price' => 44],
            ['product' => 'bananas', 'price' => 40],
            ['product' => 'bananas', 'price' => 66],
        ])->whereNotIn('price', [33, 40]);

        $collection = collect([
            ['product' => 'apples', 'price' => 33],
            ['product' => 'apples', 'price' => 44],
            ['product' => 'bananas', 'price' => 40],
            ['product' => 'bananas', 'price' => 66],
        ])->whereNotIn('price', ['33', '40']);
        dd($collection);
    }

    public function whereBetween()
    {
        // TODO :: whereBetween Filter items such that the value of the given key is between the given values

        $collection = collect([
            ['product' => 'apples', 'price' => 33],
            ['product' => 'apples', 'price' => 44],
            ['product' => 'bananas', 'price' => 40],
            ['product' => 'bananas', 'price' => 66],
        ])->whereBetween('price', [33, 44]);
        dd($collection);

    }

    public function whereNotBetween()
    {
        // TODO :: whereNotBetween Filter items such that the value of the given key is not between the given values.

        $collection = collect([
            ['product' => 'apples', 'price' => 33],
            ['product' => 'apples', 'price' => 44],
            ['product' => 'bananas', 'price' => 40],
            ['product' => 'bananas', 'price' => 66],
        ])->whereNotBetween('price', [33, 44]);
        dd($collection);

    }


    public function wrap()
    {
//        dd($this->everyThree([1, 2, 3, 4], [5, 6, 7, 8]));

        dd($this->mergeArray([1, 2, 3, 4], [5, 6, 7, 8]));
    }

    public function everyThree(...$collection)
    {
        return collect($collection)->flatMap(function ($item) {
            return Collection::wrap($item)->nth(3);
        });
    }

    public function mergeArray(...$collection)
    {
        return collect($collection)->flatMap(function ($item) {
            return Arr::wrap(Collection::unwrap($item));

        });
    }


    public function filter()
    {
        $res = collect([0, 1, 2, 3, 4, 5, 6])->filter(function ($item) {
            return ($item % 2 !== 0);
        });
        dd($res);
    }

    public function pluck()
    {
//        $res = collect([
//            ['product' => 'apples', 'price' => 33,'quantity' => 5],
//            ['product' => 'oranges', 'price' => 44,'quantity' => 6],
//            ['product' => 'bananas', 'price' => 33,'quantity' => 7],
//            ['product' => 'lemons', 'price' => 66,'quantity' => 8],
//        ])->pluck('product','quantity');

        $res = collect([
            ['product' => 'apples', 'price' => 33, 'quantity' => 5],
            ['product' => 'oranges', 'price' => 44, 'quantity' => 6],
            ['product' => 'bananas', 'price' => 33, 'quantity' => 7],
            ['product' => 'lemons', 'price' => 66, 'quantity' => 8],
        ])->map(function ($item) {
            return collect($item)->only(['product', 'quantity'])->all();
        });

        dd($res);
    }


    public function firstWhere()
    {
        $res = collect([
            ['product' => 'apples', 'price' => null, 'quantity' => 5],
            ['product' => 'oranges', 'price' => null, 'quantity' => 6],
            ['product' => 'bananas', 'price' => 50, 'quantity' => 7],
            ['product' => 'lemons', 'price' => 66, 'quantity' => 8],
        ])->firstWhere('price', null);

        dd($res);
    }

    public function zip()
    {
        $res = collect([1, 2, 3, 4, 5])->zip([11, 22, 33, 44], [111, 222, 333, 444, 555]);

        dd($res);
    }

    public function sort()
    {
        $res = collect(['1_0', '2_00', '30', '4_0', '_5'])->sort(function ($a, $b) {
            $code = str_replace('_', '', $a);
            return $code;
        });
        dd($res);
    }

    public function sortBy()
    {
        $res = collect([
            ['product' => 'apples', 'price' => 100, 'quantity' => 5, 'code' => 'A30'],
            ['product' => 'oranges', 'price' => 20, 'quantity' => 10, 'code' => 'A-20'],
            ['product' => 'bananas', 'price' => 50, 'quantity' => 17, 'code' => 'A-50'],
            ['product' => 'lemons', 'price' => 66, 'quantity' => 8, 'code' => 'A40'],
        ])->sortBy(function ($item){
            return str_replace('-','',$item['code']);
        });

        dd($res);
    }


}


class Converter
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function toCentimetres()
    {
        return $this->amount * 100;
    }
}
