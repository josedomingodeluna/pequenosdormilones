<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Customer;

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
            'first_name'=> 'Publico en',
            'last_name' => 'General',
            'email'     => 'Sin Correo',
            'phone'     => '0000000000',
            'address'   => 'Sin Domicilio',
        ]);
    }
}
