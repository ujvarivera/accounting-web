<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Invoice::factory()->count(10)->create();

        InvoiceItem::insert([
            [
                'invoice_id' => 1,
                'description' => '1 kilogram of apples',
                'cost' => '800'
            ],
            [
                'invoice_id' => 1,
                'description' => '1 kilogram of bananas',
                'cost' => '600'
            ],
        ]);
    }
}
