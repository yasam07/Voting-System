<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            ['name' => 'Koshi Province'],
            ['name' => 'Madesh Province'],
            ['name' => 'Bagmati Province'],
            ['name' => 'Gandaki Province'],
            ['name' => 'Lumbini Province'],
            ['name' => 'Karnali Province'],
            ['name' => 'Sudurpashchim Province'],
        ];

        foreach ($provinces as $province) {
            Province::create($province);
        }
    }
}
