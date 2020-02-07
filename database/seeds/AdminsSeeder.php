<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\User::create([
            'name' => 'جواد فتاحی',
            'email' => 'fatahi',
            'password' => \Illuminate\Support\Facades\Hash::make('fatahi@98@123'),
        ]);

    }
}
