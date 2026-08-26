<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Electronics', 'description' => 'Electronic devices']);
        Category::create(['name' => 'Clothes', 'description' => 'Men and women clothes']);
        Category::create(['name' => 'Books', 'description' => 'All kinds of books']);
    }
}