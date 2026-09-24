<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceItemSeeder extends Seeder
{
    public function run(): void
    {
        // line_total is a generated/computed column — do NOT insert it manually
        DB::table('invoice_items')->insert([
            ['invoice_id' => 1, 'item_id' => 1, 'quantity' => 2,  'unit_price' => 89500.00],
            ['invoice_id' => 2, 'item_id' => 3, 'quantity' => 1,  'unit_price' => 24500.00],
            ['invoice_id' => 3, 'item_id' => 2, 'quantity' => 1,  'unit_price' => 185000.00],
            ['invoice_id' => 3, 'item_id' => 5, 'quantity' => 1,  'unit_price' => 18900.00],
            ['invoice_id' => 3, 'item_id' => 4, 'quantity' => 4,  'unit_price' => 1250.00],
            ['invoice_id' => 4, 'item_id' => 1, 'quantity' => 0,  'unit_price' => 89500.00],
            ['invoice_id' => 4, 'item_id' => 5, 'quantity' => 2,  'unit_price' => 18900.00],
            ['invoice_id' => 5, 'item_id' => 4, 'quantity' => 10, 'unit_price' => 1250.00],
            ['invoice_id' => 5, 'item_id' => 3, 'quantity' => 0,  'unit_price' => 24500.00],
        ]);
    }
}
