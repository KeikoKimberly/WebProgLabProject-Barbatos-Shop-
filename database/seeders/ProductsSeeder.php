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
            'category_id' => '1',
            'name' => 'scarlet',
            'detail' => 'ini sabun scarlett',
            'price' => 45000,
            'qty' => 3,
            'photo' => 'Scarlett.jpg'
        ]);

        DB::table('products')->insert([
            'category_id' => '1',
            'name' => 'skintific',
            'detail' => 'ini sabun skintific',
            'price' => 65000,
            'qty' => 5,
            'photo' => 'Skintific2.jpg'
        ]);

        DB::table('products')->insert([
            'category_id' => '2',
            'name' => 'Tolak Angin',
            'detail' => 'ini tolak angin',
            'price' => 3000,
            'qty' => 4,
            'photo' => 'TolakAngin.jpg'
        ]);

        DB::table('products')->insert([
            'category_id' => '3',
            'name' => 'Sofa Bagus',
            'detail' => 'ini Sofa',
            'price' => 605000,
            'qty' => 3,
            'photo' => 'Sofa.jpg'
        ]);
    }
}
