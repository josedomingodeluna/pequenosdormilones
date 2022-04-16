<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\PaymentFrequency;

class PaymentFrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentFrequency::create([
            'name' => 'Diario',
        ]);

        PaymentFrequency::create([
            'name' => 'Semanal',
        ]);

        PaymentFrequency::create([
            'name' => 'Quincenal',
        ]);

        PaymentFrequency::create([
            'name' => 'Mensual',
        ]);

        PaymentFrequency::create([
            'name' => 'Comisión',
        ]);
    }
}
