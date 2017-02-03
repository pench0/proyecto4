<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'firstName' => 'Carlos',
            'lastName'  => 'Abrisqueta',
            'password'  => bcrypt(123456),
            'email'     => 'iescierva.carlos@gmail.com',
            'rol'       => 'Administrador'
        ]);

        factory(App\User::class)->create([
            'firstName' =>  'Pepe',
            'lastName'  =>  'Sánchez',
            'password'  =>  bcrypt(123456),
            'email'     =>  'pepe@pepe.es',
            'rol'       =>  'AlumnoFP'
        ]);

        factory(App\User::class)->create([
            'firstName' =>  'Juan',
            'lastName'  =>  'Martínez',
            'password'  =>  bcrypt(123456),
            'email'     =>  'juan@juan.es',
            'rol'       =>  'AlumnoESO'
        ]);

        factory(App\User::class,100)->create();
    }
}
