<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
          'name' => 'Sengsoulisay',
          'email' => 'sslssp1996@gmail.com',
          'password' => Hash::make('Lonine1011'),
          'status' => 'public',
          'remember_token' => Str::random(10),
        ]);
    }
}
