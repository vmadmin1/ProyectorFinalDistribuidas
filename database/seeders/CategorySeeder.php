<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Gestión y Administración',
            'Liderazgo y Habilidades Interpersonales',
            'Toma de Decisiones y Estrategia',
            'Construcción y Obra Pública',
            'Tecnología y Herramientas',
            'Ventas y Calidad de Servicio',
            'Seguridad y Salud Ocupacional',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
