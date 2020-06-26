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
        DB::table('users')->insert([
            'name' => 'Seme Legate',
            'email' => 'seme.legate@gmail.com',
            'password' => Hash::make('piuskw77'),
            'gender' => 'male',
            'picture' => '',
            'role'=>'admin'
        ]);
    }
}
