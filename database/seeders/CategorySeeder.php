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
        Category::create([
            'name' =>'Category1',
            'description' => 'description'
        ]);
        Category::create([
            'name' =>'Category2',
            'description' => 'description'
        ]);
        Category::create([
            'name' =>'Category3',
            'description' => 'description'
        ]);
        Category::create([
            'name' =>'Category4',
            'description' => 'description'
        ]);
        Category::create([
            'name' =>'Category5',
            'description' => 'description'
        ]);
    }
}
