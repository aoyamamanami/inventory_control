<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTIme;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => 001,
            'name' => 'アイスコーヒー豆',
            'quantity' => 50,
            'user_id' => 000001,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'deleted_at' => null,
        ]);
        DB::table('products')->insert([
            'category_id' => 001,
            'name' => 'ブレンド豆',
            'quantity' => 50,
            'user_id' => 000001,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'deleted_at' => null,
            ]);
    }
}
