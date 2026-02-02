<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    public function run()
    {

        $districts = [
            // Koshi Province
            ['province_id' => 1, 'name' => 'Bhojpur'],
            ['province_id' => 1, 'name' => 'Dhankuta'],
            ['province_id' => 1, 'name' => 'Ilam'],
            ['province_id' => 1, 'name' => 'Jhapa'],
            ['province_id' => 1, 'name' => 'Morang'],
            ['province_id' => 1, 'name' => 'Sankhuwasabha'],

            // Madesh Province
            ['province_id' => 2, 'name' => 'Saptari'],
            ['province_id' => 2, 'name' => 'Siraha'],
            ['province_id' => 2, 'name' => 'Dhanusha'],
            ['province_id' => 2, 'name' => 'Mahottari'],
            ['province_id' => 2, 'name' => 'Sarlahi'],
            ['province_id' => 2, 'name' => 'Rautahat'],

            // Bagmati Province
            ['province_id' => 3, 'name' => 'Kathmandu'],
            ['province_id' => 3, 'name' => 'Bhaktapur'],
            ['province_id' => 3, 'name' => 'Lalitpur'],
            ['province_id' => 3, 'name' => 'Dhading'],
            ['province_id' => 3, 'name' => 'Nuwakot'],
            ['province_id' => 3, 'name' => 'Ramechhap'],

            // Gandaki Province
            ['province_id' => 4, 'name' => 'Kaski'],
            ['province_id' => 4, 'name' => 'Lamjung'],
            ['province_id' => 4, 'name' => 'Manang'],
            ['province_id' => 4, 'name' => 'Mustang'],
            ['province_id' => 4, 'name' => 'Gorkha'],
            ['province_id' => 4, 'name' => 'Tanahun'],

            // Lumbini Province
            ['province_id' => 5, 'name' => 'Rupandehi'],
            ['province_id' => 5, 'name' => 'Kapilvastu'],
            ['province_id' => 5, 'name' => 'Palpa'],
            ['province_id' => 5, 'name' => 'Nawalparasi'],
            ['province_id' => 5, 'name' => 'Arghakhanchi'],
            ['province_id' => 5, 'name' => 'Gulmi'],

            // Karnali Province
            ['province_id' => 6, 'name' => 'Jumla'],
            ['province_id' => 6, 'name' => 'Dolpa'],
            ['province_id' => 6, 'name' => 'Humla'],
            ['province_id' => 6, 'name' => 'Kalikot'],
            ['province_id' => 6, 'name' => 'Mugu'],
            ['province_id' => 6, 'name' => 'Salyan'],

            // Sudurpashchim Province
            ['province_id' => 7, 'name' => 'Baitadi'],
            ['province_id' => 7, 'name' => 'Dadeldhura'],
            ['province_id' => 7, 'name' => 'Doti'],
            ['province_id' => 7, 'name' => 'Kailali'],
            ['province_id' => 7, 'name' => 'Kanchanpur'],
            ['province_id' => 7, 'name' => 'Bajhang'],
        ];


        foreach ($districts as $district) {
            District::create($district);
        }
    }
}
