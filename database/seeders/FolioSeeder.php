<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Folio;

class FolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Folio::create([
            'branch_id' => '1',
            'serie'     => 'OC',
            'folio'     => '1',
        ]);

        Folio::create([
            'branch_id' => '2',
            'serie'     => 'OC',
            'folio'     => '1',
        ]);
    }
}
