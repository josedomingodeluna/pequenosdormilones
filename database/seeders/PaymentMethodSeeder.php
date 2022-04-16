<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'code' => '01',
            'name' => 'Efectivo',
        ]);

        PaymentMethod::create([
            'code' => '02',
            'name' => 'Cheque nominativo',
        ]);

        PaymentMethod::create([
            'code' => '03',
            'name' => 'Transferencia electronica de fondos',
        ]);

        PaymentMethod::create([
            'code' => '04',
            'name' => 'Tarjeta de Credito',
        ]);
    }
}
