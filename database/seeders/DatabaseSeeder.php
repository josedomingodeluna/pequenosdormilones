<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(FolioSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(PaymentFrequencySeeder::class);
        $this->call(PaymentMethodSeeder::class);
    }
}
