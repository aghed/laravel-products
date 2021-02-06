<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'order_date'=>date_create_from_format('d-m-Y','5-7-2020'),
            'order_number'=>'5',
            'customer_id'=>1,
            'total_amount'=>1000
        ]);

        Order::create([
            'order_date'=>date_create_from_format('d-m-Y','14-8-2020'),
            'order_number'=>'8',
            'customer_id'=>2,
            'total_amount'=>600
        ]);
    }
}
