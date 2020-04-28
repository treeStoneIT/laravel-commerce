<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        \App\User::create([
            'name' => 'Non Admin',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);
    }
}
