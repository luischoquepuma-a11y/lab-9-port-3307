<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use App\Models\Producto;
 
class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        Producto::truncate();
 
        
$productos = [
    ['nombre'=>'Laptop HP 15',       'marca'=>'HP',      'precio'=>2500.00,'stock'=>10,'id_categoria'=>1,'foto'=>'laptop.png'],
    ['nombre'=>'Audifonos Bluetooth', 'marca'=>'Sony',    'precio'=> 120.50,'stock'=>25,'id_categoria'=>1,'foto'=>'audifono.webp'],
    ['nombre'=>'Teclado Mecanico',    'marca'=>'Logitech','precio'=> 189.90,'stock'=>15,'id_categoria'=>1,'foto'=>'teclado.jfif'],
    ['nombre'=>'Polo Deportivo',      'marca'=>'Adidas',  'precio'=>  45.00,'stock'=>50,'id_categoria'=>2,'foto'=>'polo.webp'],
    ['nombre'=>'Gorra Casual',        'marca'=>'Nike',    'precio'=>  35.00,'stock'=>30,'id_categoria'=>2,'foto'=>'gorra.webp'],
    ['nombre'=>'Cafe Organico 250g',  'marca'=>'Altomayo','precio'=>  18.90,'stock'=>100,'id_categoria'=>3,'foto'=>'cafe.jpg'],
    ['nombre'=>'Avena Tres Ositos',   'marca'=>'3 Ositos','precio'=>   8.50,'stock'=>80,'id_categoria'=>3,'foto'=>'avena.jpg'],
    ['nombre'=>'Lampara LED',         'marca'=>'Philips', 'precio'=>  55.00,'stock'=>20,'id_categoria'=>4,'foto'=>'lampara.webp'],
    ['nombre'=>'Pelota de Futbol',    'marca'=>'Mikasa',  'precio'=>  79.00,'stock'=>40,'id_categoria'=>5,'foto'=>'pelota.avif'],
];


 
        foreach ($productos as $prod) {
            Producto::create($prod);
        }
 
        $this->command->info('✔ Productos insertados: ' . count($productos));
    }
}

