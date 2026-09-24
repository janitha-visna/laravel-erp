<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'item_code'       => 'ITM-001',
                'item_name'       => 'Samsung Galaxy A55',
                'category_id'     => 1,
                'sub_category_id' => 1, // Mobile Phones
                'quantity'        => 50,
                'unit_price'      => 89500.00,
                'created_at'      => '2026-04-14 14:31:34',
                'updated_at'      => '2026-04-14 14:31:34',
            ],
            [
                'item_code'       => 'ITM-002',
                'item_name'       => 'Dell Inspiron 15',
                'category_id'     => 1,
                'sub_category_id' => 2, // Laptops
                'quantity'        => 20,
                'unit_price'      => 185000.00,
                'created_at'      => '2026-04-14 14:31:34',
                'updated_at'      => '2026-04-14 14:31:34',
            ],
            [
                'item_code'       => 'ITM-003',
                'item_name'       => 'Office Executive Chair',
                'category_id'     => 2,
                'sub_category_id' => 5, // Office Furniture
                'quantity'        => 15,
                'unit_price'      => 24500.00,
                'created_at'      => '2026-04-14 14:31:34',
                'updated_at'      => '2026-04-14 14:31:34',
            ],
            [
                'item_code'       => 'ITM-004',
                'item_name'       => 'A4 Paper Ream 500s',
                'category_id'     => 5,
                'sub_category_id' => 15, // Paper Products
                'quantity'        => 200,
                'unit_price'      => 1250.00,
                'created_at'      => '2026-04-14 14:31:34',
                'updated_at'      => '2026-04-14 14:31:34',
            ],
            [
                'item_code'       => 'ITM-005',
                'item_name'       => 'Microsoft Office 365',
                'category_id'     => 7,
                'sub_category_id' => 21, // Productivity
                'quantity'        => 100,
                'unit_price'      => 18900.00,
                'created_at'      => '2026-04-14 14:31:34',
                'updated_at'      => '2026-04-14 14:31:34',
            ],
        ]);
    }
}
