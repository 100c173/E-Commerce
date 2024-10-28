<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'user_id' => 1 ,
            'product_id' => 1,
            'total_price'=>100
        ]);
        Order::create([
            'user_id' => 1 ,
            'product_id' => 2,
            'total_price'=>100
        ]);
        Order::create([
            'user_id' => 1 ,
            'product_id' => 1,
            'total_price'=>100
        ]);
        Order::create([
            'user_id' => 1 ,
            'product_id' => 1,
            'total_price'=>100
        ]);
        Order::create([
            'user_id' => 1 ,
            'product_id' => 3,
            'total_price'=>100
        ]);
    }
}
