<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nombreUsuario' => 'Luna de Torres',
            'nombre' => 'Luna',
            'apellidos' => 'de Torres',
            'email'=> 'lunadte00@gmail.com',
            'password' => bcrypt('holahola'),
            'direccion' => 'María Cúspide 17',
            'telefono' => 678571498,
            'fechaNacimiento' => '13/10/2000'
        ]);

        Usuario::create([
            'nombreUsuario' => 'Jesús Sena',
            'nombre' => 'Jesús',
            'apellidos' => 'Sena',
            'email'=> 'jesussena@gmail.com',
            'password' => bcrypt('holahola0'),
            'direccion' => 'María Dios 18',
            'telefono' => 678574588,
            'fechaNacimiento' => '15/02/1990'
        ]);

        Usuario::create([
            'nombreUsuario' => 'Kacper Zaleski',
            'nombre' => 'Kacper',
            'apellidos' => 'Zaleski',
            'email'=> 'kaxperzaleski@gmail.com',
            'password' => bcrypt('holahola1'),
            'direccion' => 'Juan Cúspide 17',
            'telefono' => 678746498,
            'fechaNacimiento' => '13/05/1999'
        ]);
    }
}
