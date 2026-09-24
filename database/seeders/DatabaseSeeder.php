<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Order matters — respect foreign key dependencies
        $this->call([
            DistrictSeeder::class,       // no FK
            ItemCategorySeeder::class,   // no FK
            ItemSubCategorySeeder::class, // FK → item_categories
            CustomerSeeder::class,       // FK → districts
            ItemSeeder::class,           // FK → item_categories, item_sub_categories
            InvoiceSeeder::class,        // FK → customers
            InvoiceItemSeeder::class,    // FK → invoices, items
        ]);
    }
}
