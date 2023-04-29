<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Producto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre'=>'Rimmel',
            'descripion'=>'Rimmel lash sensational de maybeline',
            'precio'=>12,
            'stock'=>5,
            'imagenUrl'=>'',
            'categoria'=>'pestañas',
            'descuento'=>20,

            ]);

        Producto::create([
            'nombre'=>'Eyerline',
            'descripion'=>'Eyerline essence waterproof',
            'precio'=>6,
            'stock'=>8,
            'imagenUrl'=>'',
            'categoria'=>'Ojos',
            'descuento'=>5,

            ]);

        Producto::create([
            'nombre'=>'Base maybeline',
            'descripion'=>'Base de maquillaje maybeline',
            'precio'=>16,
            'stock'=>10,
            'imagenUrl'=>'',
            'categoria'=>'Piel',
            'descuento'=>10,

            ]);    
    }
}
