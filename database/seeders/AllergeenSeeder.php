<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Allergeen;

class AllergeenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Allergeen::insert([
            [
                'naam' => 'Gluten',
                'omschrijving' => 'Dit product bevat gluten',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Gelatine',
                'omschrijving' => 'Dit product bevat gelatine',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'AZO-Kleurstof',
                'omschrijving' => 'Dit product bevat AZO-kleurstof',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Lactose',
                'omschrijving' => 'Dit product bevat lactose',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Soja',
                'omschrijving' => 'Dit product bevat soja',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
