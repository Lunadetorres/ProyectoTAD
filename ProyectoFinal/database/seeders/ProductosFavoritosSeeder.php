<?php

namespace Database\Seeders;

use App\Models\ProductosFavoritos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosFavoritosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductosFavoritos::create([
            'idUsuario' => 1,
            'idProducto' => 1
        ]);
    }
}
