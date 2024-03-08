<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::insert([
            [
                'straat' => 'Van Gilslaan',
                'huisnummer' => '34',
                'postcode' => '1045CB',
                'stad' => 'Hilvarenbeek',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'straat' => 'Den Dolderpad',
                'huisnummer' => '2',
                'postcode' => '1067RC',
                'stad' => 'Utrecht',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'straat' => 'Fredo Raalteweg',
                'huisnummer' => '257',
                'postcode' => '1236OP',
                'stad' => 'Nijmegen',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'straat' => 'Bertrand Russellhof',
                'huisnummer' => '21',
                'postcode' => '2034AP',
                'stad' => 'Den Haag',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'straat' => 'Leon van Bonstraat',
                'huisnummer' => '213',
                'postcode' => '145XC',
                'stad' => 'Lunteren',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'straat' => 'Bea van Lingenlaan',
                'huisnummer' => '234',
                'postcode' => '2197FG',
                'stad' => 'Sint Pancras',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
