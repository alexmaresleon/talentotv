<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;

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
        $user = User::create([
            'name'=> 'Alejandro Mares',
            'email' => 'alexmaresleon@gmail.com',
            'password'=> bcrypt('T4lent0TV') 

        ]);

        $user->assignRole('Administrador');

        User::factory(99)->create();
    }
}
