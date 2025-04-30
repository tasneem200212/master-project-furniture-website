<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'name' => 'Living Room',
            'description' => 'Furniture and decor for the living room, including sofas, chairs, and coffee tables.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Category::create([
            'name' => 'Bedroom',
            'description' => 'Furniture for the bedroom, such as beds, wardrobes, and nightstands.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        Category::create([
            'name' => 'Office',
            'description' => 'Office furniture including desks, chairs, and storage solutions.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    
}
