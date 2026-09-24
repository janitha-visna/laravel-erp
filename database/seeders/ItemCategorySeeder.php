<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Electronics', 'Furniture', 'Clothing', 'Food & Beverage',
            'Stationery', 'Hardware', 'Software', 'Medical', 'Automotive', 'Sports',
        ];

        foreach ($categories as $name) {
            DB::table('item_categories')->insert(['name' => $name]);
        }
    }
}
