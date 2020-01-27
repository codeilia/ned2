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
            'role' => 0,
            'personal_code' => 'root',
            'username' => 'root',
            'password' => \Illuminate\Support\Facades\Hash::make('crmR00t'),
        ]);

        $details = \App\Models\UserDetail::create([
            'first_name' => 'کاربر ارشد',
            'user_id' => $admin->id
        ]);
    }
}
