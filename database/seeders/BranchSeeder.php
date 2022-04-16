<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'name'=> 'Querétaro',
            'address' => 'Prolongación Jalisco #16, San José el alto, Quéretaro. C.P 76147',
            'phone'         => '4422757831',
            'email_cs'     => 'pequenosdormilones.qro@gmail.com',
            'email_s'    => '',
        ]);

        Branch::create([
            'name'=> 'Estado de México',
            'address' => 'Periférico Boulevard Manuel Ávila Camacho #13, Col. Viveros de la loma, Tlalnepantla, Estado de México. C.P 54080.',
            'phone'         => '5553658177',
            'email_cs'     => 'pequenosdormilones.qro@gmail.com',
            'email_s'    => '',
        ]);
    }
}
