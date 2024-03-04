<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'naam' => 'Mintnopjes',
                'barcode' => '8719587231278',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Schoolkrijt',
                'barcode' => '8719587326713',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Honingdrop',
                'barcode' => '8719587327836',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Zure Beren',
                'barcode' => '8719587321441',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Cola Flesjes',
                'barcode' => '8719587321237',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Turtles',
                'barcode' => '8719587322245',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Witte Muizen',
                'barcode' => '8719587328256',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Reuzen Slangen',
                'barcode' => '8719587325641',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Zoute Rijen',
                'barcode' => '8719587322739',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Winegums',
                'barcode' => '8719587327527',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Drop Munten',
                'barcode' => '8719587322345',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Kruis Drop',
                'barcode' => '8719587322265',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Zoute Ruitjes',
                'barcode' => '8719587323256',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
