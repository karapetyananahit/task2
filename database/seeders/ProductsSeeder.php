<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 10; $i++) {

            $randomDescription1 = "";
            $randomDescription2 = "";

            $randomCount1 = mt_rand(10, 20);
            $randomCount2 = mt_rand(40, 60);

            for ($j = 0; $j < $randomCount1; $j++) {
                $randomDescription1 .= Str::random(mt_rand(3, 10)) . " ";
            }

            for ($j = 0; $j < $randomCount2; $j++) {
                $randomDescription2 .= Str::random(mt_rand(3, 10)) . " ";
            }


            DB::table('products')->insert([
                'title' => Str::random(5),
                'description' => $randomDescription1,
                'text' => $randomDescription2,
            ]);
        }
    }
}
