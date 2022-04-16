<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Document;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'name' => 'Cotización',
        ]);

        Document::create([
            'name' => 'Orden de Compra',
        ]);
    }
}
