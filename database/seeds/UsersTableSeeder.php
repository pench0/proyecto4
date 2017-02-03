<?php

use App\User;
use Faker\Factory as Faker;
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
        $user = new User;

        $user->firstName = 'Carlos';
        $user->lastName = 'Abrisqueta';
        $user->password = bcrypt(123456);
        $user->email = 'iescierva.carlos@gmail.com';
        $user->rol = 'Administrador';
        $user->token = bcrypt(date('YmdHms'));

        $user->save();

        User::create([
            'firstName' =>  'Pepe',
            'lastName'  =>  'Sánchez',
            'password'  =>  bcrypt(123456),
            'email'     =>  'pepe@pepe.es',
            'rol'       =>  'AlumnoFP',
            'token'     =>  bcrypt(date('YmdHms'))
        ]);

        \DB::table('users')->insert([
            'firstName' =>  'Juan',
            'lastName'  =>  'Martínez',
            'password'  =>  bcrypt(123456),
            'email'     =>  'juan@juan.es',
            'rol'       =>  'AlumnoESO',
            'token'     =>  bcrypt(date('YmdHms'))
        ]);

        $faker = Faker::create('es_ES');

        for ($i=0; $i<100; $i++) {
            $id = \DB::table('users')->insertGetId([
                'firstName' =>  $faker->firstName,
                'lastName'  =>  $faker->lastName,
                'password'  =>  bcrypt(123456),
                'email'     =>  $faker->unique()->safeEmail,
                'rol'       =>  $faker->randomElement([
                    'Profesor',
                    'AlumnoESO',
                    'AlumnoBach',
                    'AlumnoFP'
                ]),
                'token'     =>  bcrypt(date('YmdHms'))
            ]
            );

            \DB::table('user_profiles')->insert([
                'user_id'   =>  $id,
                'biograph'  =>  $faker->paragraph(rand(2,5)),
                'website'   =>  'http://www.'.$faker->domainName,
                'twitter'   =>  'http://www.twitter.com/'.$faker->userName,
                'birthdate' =>  $faker->dateTimeBetween('-45 years','-15 years')->format('Y-m-d')
            ]);
        }
    }
}
