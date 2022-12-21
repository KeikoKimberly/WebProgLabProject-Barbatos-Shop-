<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

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
            'category_id' => '2',
            'name' => 'scarlet',
            'detail' => 'ini sabun scarlett',
            'price' => 45000,
            'photo' => 'Scarlett.jpg'
        ]);

        DB::table('products')->insert([
            'category_id' => '2',
            'name' => 'skintific',
            'detail' => 'ini sabun skintific',
            'price' => 65000,
            'photo' => 'Skintific2.jpg'
        ]);
    }
}
