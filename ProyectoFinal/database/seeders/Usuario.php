<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Usuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
        'nombreUsuario'=>'LunadeTorres',
        'email'=>'luna@gmail.com',
        'password'=>bcrypt('holaluna'),
        'direccion'=>'María Luna, 12',
        'nombre'=>'Luna',
        'apellidos'=>'de Torres',
        'telefono'=>678549875,
        'fechaNacimiento'=>'13/10/2000'

        ]);

        Usuario::create([
            'nombreUsuario'=>'JesusSena',
            'email'=>'jesus@gmail.com',
            'password'=>bcrypt('holajesus'),
            'direccion'=>'María tornado, 7',
            'nombre'=>'Jesus',
            'apellidos'=>'Sena',
            'telefono'=>689523654,
            'fechaNacimiento'=>'13/02/1990'
    
            ]);
    }
}
