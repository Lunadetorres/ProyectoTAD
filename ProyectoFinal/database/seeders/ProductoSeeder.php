<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
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
            'descripcion'=>'Rimmel lash sensational de maybeline',
            'precio'=>12,
            'stock'=>5,
            'imagenUrl'=>'https://cloudinary.images-iherb.com/image/upload/f_auto,q_auto:eco/images/mby/mby42061/l/11.jpg',
            'categoria'=>'pestañas',
            'descuento'=>20,

            ]);

        Producto::create([
            'nombre'=>'Eyerline',
            'descripcion'=>'Eyerline essence waterproof',
            'precio'=>6,
            'stock'=>8,
            'imagenUrl'=>'https://www.prieto.es/images/product/1/large/pl_1_1_17527.jpg',
            'categoria'=>'Ojos',
            'descuento'=>5,

            ]);

        Producto::create([
            'nombre'=>'Base LOreal',
            'descripcion'=>'Base de maquillaje LOreal',
            'precio'=>16,
            'stock'=>10,
            'imagenUrl'=>'https://www.maquillalia.com/images/productos/loreal-paris-base-de-maquillaje-infalible-32h-fresh-wear-140-beige-dore-1-67372.jpeg',
            'categoria'=>'Piel',
            'descuento'=>10,

            ]);    

        Producto::create([
            'nombre'=>'Sérum Facial Ordinary',
            'descripcion'=>'Sérum facial Ordinary con ácido hialurónico',
            'precio'=>12,
            'stock'=>3,
            'imagenUrl'=>'https://e00-telva.uecdn.es/assets/multimedia/imagenes/2020/05/25/15903951334258.jpg',
            'categoria'=>'Facial',
            'descuento'=>0
        ]);

        Producto::create([
            'Nombre'=>'Pintalabios Maybeline',
            'descripcion'=>'Pintalabios Morado Maybeline SuperStay',
            'precio'=>12.99,
            'stock'=>8,
            'imagenUrl'=>'https://cdns3-3.primor.eu/54981-large/superstay-matte-ink-labial-liquido.jpg',
            'categoria'=>'Labios',
            'descuento'=>15
        ]);
    }
}
