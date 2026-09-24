<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('invoices')->insert([
            ['invoice_number' => 'INV-2024-0001', 'customer_id' => 1, 'invoice_date' => '2026-01-10', 'total_amount' => 178750.00, 'created_at' => '2026-04-14 14:31:34'],
            ['invoice_number' => 'INV-2024-0002', 'customer_id' => 2, 'invoice_date' => '2026-02-15', 'total_amount' => 24500.00,  'created_at' => '2026-04-14 14:31:34'],
            ['invoice_number' => 'INV-2024-0003', 'customer_id' => 3, 'invoice_date' => '2026-02-01', 'total_amount' => 208900.00, 'created_at' => '2026-04-14 14:31:34'],
            ['invoice_number' => 'INV-2025-0001', 'customer_id' => 4, 'invoice_date' => '2026-01-20', 'total_amount' => 37800.00,  'created_at' => '2026-04-14 14:31:34'],
            ['invoice_number' => 'INV-2025-0002', 'customer_id' => 5, 'invoice_date' => '2026-03-14', 'total_amount' => 20150.00,  'created_at' => '2026-04-14 14:31:34'],
        ]);
    }
}
