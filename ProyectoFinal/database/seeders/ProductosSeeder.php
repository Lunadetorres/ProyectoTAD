<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'rimmel',
            'descripcion' => 'Producto para las pestañas',
            'precio' => 5.00,
            'imagenUrl' => '',
            'categoria' => 'Pestañas',
        ]);

        Producto::create([
            'nombre' => 'Pintalabios',
            'descripcion' => 'Producto para los labios',
            'precio' => 8.00,
            'imagenUrl' => '',
            'categoria' => 'Labios',
        ]);

        Producto::create([
            'nombre' => 'Base de maquillaje',
            'descripcion' => 'Producto para la cara',
            'precio' => 12.50,
            'imagenUrl' => '',
            'categoria' => 'Cara',
        ]);

    }
}
