<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create( [   
            'nombreUsuario'=>'Jose',
            'email'=>'jose@gmail.com',
            'password'=>'12345678',
            'direccion'=>'C\río Miño',
            'nombre'=>'José',
            'apellidos'=>'Campana Suena',
            'telefono'=>'666555222',
            'fechaNacimiento'=>'22/05/2000',
        ]);
        Usuario::create( [   
            'nombreUsuario'=>'Maria',
            'email'=>'maria@gmail.com',
            'password'=>'00001111',
            'direccion'=>'C\Nueva',
            'nombre'=>'María',
            'apellidos'=>'Montes Perdidos',
            'telefono'=>'666111666',
            'fechaNacimiento'=>'12/12/1995',
        ]);
    }
}
