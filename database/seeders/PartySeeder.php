<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Party;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parties = [
            'CPN UML',
            'Nepali Congress',
            'CPN Moist centre',
            'Rastriya Swatantra Party',
            'Rastriya Prajatantra Party',
        ];

        foreach( $parties as $party ) {
            Party::create(['name' => $party]);
        }
    }
}
