<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductPerAllergeen;

class ProductPerAllergeenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductPerAllergeen::insert([
            [
                'productId' => 1,
                'allergeenId' => 1,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 1,
                'allergeenId' => 2,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 1,
                'allergeenId' => 3,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 3,
                'allergeenId' => 4,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 6,
                'allergeenId' => 5,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 9,
                'allergeenId' => 2,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 9,
                'allergeenId' => 5,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 10,
                'allergeenId' => 2,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 12,
                'allergeenId' => 4,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 13,
                'allergeenId' => 1,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 13,
                'allergeenId' => 4,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 13,
                'allergeenId' => 5,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
