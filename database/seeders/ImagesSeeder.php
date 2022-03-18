<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            "img1.jpg",
            "img2.jpg",
            "img3.jpg",
            "img4.jpg",
            "img5.jpg",
            "img6.jpg",
            "img7.jpg",
            "img8.jpg",
            "img9.jpg",
            "img10.jpg"
        ];

        $arr = [];
        $arr1 = [];
        $arr2 = [];
        $arr3 = [];
        $arr4 = [];
        $arr5 = [];
        $arr6 = [];
        $arr7 = [];
        $arr8 = [];
        $arr9 = [];
        $arr10 = [];


        for ($i = 0; $i < 1000; $i++) {
            $product_id = mt_rand(1, 10);
            if (count($arr1) >= 20 || count($arr2) >= 20 || count($arr3) >= 20 || count($arr4) >= 20 || count($arr5) >= 20 || count($arr6) >= 20 || count($arr7) >= 20 || count($arr8) >= 20 || count($arr9) >= 20 || count($arr10) >= 20) {
                break;
            } else {

                if ($product_id === 0) {
                    $arr0[] = $product_id;
                    $arr[] = $product_id;

                } elseif ($product_id === 1) {
                    $arr1[] = $product_id;
                    $arr[] = $product_id;

                } elseif ($product_id === 2) {
                    $arr2[] = $product_id;
                    $arr[] = $product_id;

                } elseif ($product_id === 3) {
                    $arr3[] = $product_id;
                    $arr[] = $product_id;

                } elseif ($product_id === 4) {
                    $arr4[] = $product_id;
                    $arr[] = $product_id;

                } elseif ($product_id === 5) {
                    $arr5[] = $product_id;
                    $arr[] = $product_id;

                } elseif ($product_id === 6) {
                    $arr6[] = $product_id;
                    $arr[] = $product_id;

                } elseif ($product_id === 7) {
                    $arr7[] = $product_id;
                    $arr[] = $product_id;

                } elseif ($product_id === 8) {
                    $arr8[] = $product_id;
                    $arr[] = $product_id;

                } elseif ($product_id === 9) {
                    $arr9[] = $product_id;
                    $arr[] = $product_id;
                } elseif ($product_id === 10) {
                    $arr10[] = $product_id;
                    $arr[] = $product_id;
                }
            }

        }

        for ($i = 0; $i < count($arr); $i++) {

            DB::table('images')->insert([
                'img' => $array[mt_rand(0, 9)],
                'product_id' => $arr[$i],
            ]);
        }
    }
}
