<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('customers')->insert([
            ['title' => 'Miss', 'first_name' => 'Maneesha',  'last_name' => 'Thathsarani', 'contact_number' => '077123567',  'district_id' => 5,  'created_at' => '2026-04-14 14:31:34', 'updated_at' => '2026-04-14 17:16:15'],
            ['title' => 'Mr',   'first_name' => 'Damith',    'last_name' => 'Kumara',       'contact_number' => '0762389608', 'district_id' => 7,  'created_at' => '2026-04-14 14:31:34', 'updated_at' => '2026-04-14 17:16:27'],
            ['title' => 'Miss', 'first_name' => 'Chethana',  'last_name' => 'Fernando',     'contact_number' => '0753456789', 'district_id' => 6,  'created_at' => '2026-04-14 14:31:34', 'updated_at' => '2026-04-14 16:49:21'],
            ['title' => 'Miss', 'first_name' => 'Lidiya',    'last_name' => 'Rajapakse',    'contact_number' => '0714566890', 'district_id' => 11, 'created_at' => '2026-04-14 14:31:34', 'updated_at' => '2026-04-14 17:16:02'],
            ['title' => 'Mr',   'first_name' => 'Chamara',   'last_name' => 'Bandara',      'contact_number' => '0705678901', 'district_id' => 14, 'created_at' => '2026-04-14 14:31:34', 'updated_at' => '2026-04-14 14:31:34'],
            ['title' => 'Mrs',  'first_name' => 'Nimali',    'last_name' => 'Silva',        'contact_number' => '0762345678', 'district_id' => 7,  'created_at' => '2026-04-14 16:13:37', 'updated_at' => '2026-04-14 16:13:37'],
            ['title' => 'Miss', 'first_name' => 'Kavindya',  'last_name' => 'Fernando',     'contact_number' => '0753456789', 'district_id' => 6,  'created_at' => '2026-04-14 16:13:37', 'updated_at' => '2026-04-14 16:52:46'],
        ]);
    }
}
