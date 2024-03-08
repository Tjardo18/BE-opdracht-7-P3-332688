<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Leverancier;

class LeverancierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Leverancier::insert([
            [
                'naam' => 'Venco',
                'contactPersoon' => 'Bert van Linge',
                'leverancierNummer' => 'L1029384719',
                'mobiel' => '06-28493827',
                'contactId' => 1,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Astra Sweets',
                'contactPersoon' => 'Jasper del Monte',
                'leverancierNummer' => 'L1029284315',
                'mobiel' => '06-39398734',
                'contactId' => 2,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Haribo',
                'contactPersoon' => 'Sven Stalman',
                'leverancierNummer' => 'L1029324748',
                'mobiel' => '06-24383291',
                'contactId' => 3,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Basset',
                'contactPersoon' => 'Joyce Stelterberg',
                'leverancierNummer' => 'L1023845773',
                'mobiel' => '06-48293823',
                'contactId' => 4,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'De Bron',
                'contactPersoon' => 'Remco Veenstra',
                'leverancierNummer' => 'L1023857736',
                'mobiel' => '06-34291234',
                'contactId' => 5,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'naam' => 'Quality Sweets',
                'contactPersoon' => 'Johan Nooij',
                'leverancierNummer' => 'L1029234586',
                'mobiel' => '06-23458456',
                'contactId' => 6,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
