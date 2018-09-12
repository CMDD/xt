<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Titular
        User::create([
          'name' => 'Javier',
          'apellidos' => 'Cerra',
          'password' => bcrypt('80157641'),
          'email' => 'web@minutodedios.tv'
        ]);
        User::create([
          'name' => 'John Alvaro',
          'apellidos' => 'Angulo',
          'password' => bcrypt('qwe123'),
          'email' => 'jhon54plex@gmail.com'
        ]);
    }
}
