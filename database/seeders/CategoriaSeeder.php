<?php
 
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
 
class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        // Desactiva restricciones foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Limpia la tabla
        Categoria::truncate();

        // Reactiva restricciones
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
 
        $categorias = [
            ['descripcion' => 'Electrónica'],
            ['descripcion' => 'Ropa y Accesorios'],
            ['descripcion' => 'Alimentos y Bebidas'],
            ['descripcion' => 'Hogar y Jardín'],
            ['descripcion' => 'Deportes'],
        ];
 
        foreach ($categorias as $cat) {
            Categoria::create($cat);
        }
 
        $this->command->info('✔ Categorías insertadas: ' . count($categorias));
    }
}
