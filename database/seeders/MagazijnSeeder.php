<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Magazijn;

class MagazijnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Magazijn::insert([
            [
                'productId' => 1,
                'verpakkingsEenheid' => 5,
                'aantalAanwezig' => 453,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 2,
                'verpakkingsEenheid' => 2.5,
                'aantalAanwezig' => 400,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 3,
                'verpakkingsEenheid' => 5,
                'aantalAanwezig' => 1,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 4,
                'verpakkingsEenheid' => 1,
                'aantalAanwezig' => 800,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 5,
                'verpakkingsEenheid' => 3,
                'aantalAanwezig' => 234,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 6,
                'verpakkingsEenheid' => 2,
                'aantalAanwezig' => 345,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 7,
                'verpakkingsEenheid' => 1,
                'aantalAanwezig' => 795,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 8,
                'verpakkingsEenheid' => 10,
                'aantalAanwezig' => 233,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 9,
                'verpakkingsEenheid' => 2.5,
                'aantalAanwezig' => 123,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 10,
                'verpakkingsEenheid' => 3,
                'aantalAanwezig' => null,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 11,
                'verpakkingsEenheid' => 2,
                'aantalAanwezig' => 367,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 12,
                'verpakkingsEenheid' => 1,
                'aantalAanwezig' => 467,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'productId' => 13,
                'verpakkingsEenheid' => 5,
                'aantalAanwezig' => 20,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
