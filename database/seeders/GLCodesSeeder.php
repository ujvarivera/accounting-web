<?php

namespace Database\Seeders;

use App\Models\GeneralLedgerCode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GLCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralLedgerCode::insert([
            [
                'code' => 381,
                'name' => 'Cash Register',
            ],
            [
                'code' => 389,
                'name' => 'Technical',
            ],
            [
                'code' => 384,
                'name' => 'Settlement Account',
            ],
            [
                'code' => 454,
                'name' => 'Suppliers',
            ],
            [
                'code' => 51,
                'name' => 'Costs of Purchased Materials',
            ],
            [
                'code' => 52,
                'name' => 'Costs of Used Services',
            ],
            [
                'code' => 814,
                'name' => 'Costs of Goods Sold',
            ],
            [
                'code' => 91,
                'name' => 'Sales Revenue',
            ],
            [
                'code' => 911,
                'name' => 'VAT Free Sales Revenue',
            ],
            [
                'code' => 912,
                'name' => '27% VAT Sales Revenue',
            ],
            [
                'code' => 913,
                'name' => '18% VAT Sales Revenue',
            ],
            [
                'code' => 914,
                'name' => '5% VAT Sales Revenue',
            ],
        ]);
    }
}
