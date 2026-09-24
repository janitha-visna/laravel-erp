<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSubCategorySeeder extends Seeder
{
    public function run(): void
    {
        // category_id references the IDs inserted by ItemCategorySeeder (1-10)
        $subCategories = [
            ['category_id' => 1, 'name' => 'Mobile Phones'],
            ['category_id' => 1, 'name' => 'Laptops'],
            ['category_id' => 1, 'name' => 'Tablets'],
            ['category_id' => 1, 'name' => 'Accessories'],
            ['category_id' => 2, 'name' => 'Office Furniture'],
            ['category_id' => 2, 'name' => 'Home Furniture'],
            ['category_id' => 2, 'name' => 'Outdoor Furniture'],
            ['category_id' => 3, 'name' => 'Men'],
            ['category_id' => 3, 'name' => 'Women'],
            ['category_id' => 3, 'name' => 'Kids'],
            ['category_id' => 4, 'name' => 'Beverages'],
            ['category_id' => 4, 'name' => 'Snacks'],
            ['category_id' => 4, 'name' => 'Fresh Produce'],
            ['category_id' => 5, 'name' => 'Pens & Pencils'],
            ['category_id' => 5, 'name' => 'Paper Products'],
            ['category_id' => 5, 'name' => 'Office Supplies'],
            ['category_id' => 6, 'name' => 'Power Tools'],
            ['category_id' => 6, 'name' => 'Hand Tools'],
            ['category_id' => 6, 'name' => 'Safety Equipment'],
            ['category_id' => 7, 'name' => 'Antivirus'],
            ['category_id' => 7, 'name' => 'Productivity'],
            ['category_id' => 7, 'name' => 'Design Tools'],
            ['category_id' => 8, 'name' => 'Medicines'],
            ['category_id' => 8, 'name' => 'Equipment'],
            ['category_id' => 8, 'name' => 'Supplements'],
            ['category_id' => 9, 'name' => 'Car Parts'],
            ['category_id' => 9, 'name' => 'Accessories'],
            ['category_id' => 9, 'name' => 'Tyres'],
            ['category_id' => 10, 'name' => 'Cricket'],
            ['category_id' => 10, 'name' => 'Football'],
            ['category_id' => 10, 'name' => 'Fitness'],
        ];

        DB::table('item_sub_categories')->insert($subCategories);
    }
}
