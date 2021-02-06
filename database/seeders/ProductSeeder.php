<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_name'=>'Chai',
            'supplier_id'=>1,
            'unit_price'=>150
        ]);
        Product::create([
            'product_name'=>'Rice',
            'supplier_id'=>1,
            'unit_price'=>300
        ]);
        Product::create([
            'product_name'=>'Sugar',
            'supplier_id'=>2,
            'unit_price'=>250
        ]);
        Product::create([
                'product_name'=>'Biscuit',
            'supplier_id'=>3,
            'unit_price'=>500
        ]);


    }
}
