<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Laptop',
            'description' => 'Gaming laptop',
            'price' => 1500,
            'quantity' => 10,
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'T-Shirt',
            'description' => 'Cotton t-shirt',
            'price' => 200,
            'quantity' => 50,
            'category_id' => 2,
        ]);
    }
}