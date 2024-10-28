<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'product1',
            'description' => 'description1',
            'price' => 100 
        ]);
        Product::create([
            'name' => 'product1',
            'description' => 'description1',
            'price' => 100 
        ]);
        Product::create([
            'name' => 'product2',
            'description' => 'description2',
            'price' => 100 
        ]);
    }
}
