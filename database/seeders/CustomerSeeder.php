<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'first_name'=>'Mohamad',
            'last_name'=>'Zid',
            'city'=>'Beirut',
            'country'=>'Lebanon',
            'phone'=>'02015485546'
        ]);
        Customer::create([
            'first_name'=>'Samer',
            'last_name'=>'Salam',
            'city'=>'Damascus',
            'country'=>'Syria',
            'phone'=>'555456687'
        ]);
    }
}
