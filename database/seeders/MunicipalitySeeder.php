<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Municipality;

class MunicipalitySeeder extends Seeder
{
    public function run()
    {
        $municipalities = [
            // Koshi Province
            ['district_id' => 1, 'name' => 'Bhojpur Municipality'],
            ['district_id' => 1, 'name' => 'Shadananda Municipality'],

            ['district_id' => 2, 'name' => 'Dhankuta Municipality'],
            ['district_id' => 2, 'name' => 'Pakhribas Municipality'],

            ['district_id' => 3, 'name' => 'Ilam Municipality'],
            ['district_id' => 3, 'name' => 'Maijogmai Municipality'],

            ['district_id' => 4, 'name' => 'Birtamode Municipality'],
            ['district_id' => 4, 'name' => 'Mechinagar Municipality'],

            ['district_id' => 5, 'name' => 'Biratnagar Metropolitan'],
            ['district_id' => 5, 'name' => 'Belbari Municipality'],

            ['district_id' => 6, 'name' => 'Sankhuwasabha Municipality'],
            ['district_id' => 6, 'name' => 'Chainpur Municipality'],

            // Madesh Province
            ['district_id' => 7, 'name' => 'Rajbiraj Municipality'],
            ['district_id' => 7, 'name' => 'Saptakoshi Municipality'],

            ['district_id' => 8, 'name' => 'Lahan Municipality'],
            ['district_id' => 8, 'name' => 'Siraha Municipality'],

            ['district_id' => 9, 'name' => 'Janakpurdham Metropolitan'],
            ['district_id' => 9, 'name' => 'Dhanusha Municipality'],

            ['district_id' => 10, 'name' => 'Bardibas Municipality'],
            ['district_id' => 10, 'name' => 'Mahottari Municipality'],

            ['district_id' => 11, 'name' => 'Malangwa Municipality'],
            ['district_id' => 11, 'name' => 'Sarlahi Municipality'],

            ['district_id' => 12, 'name' => 'Gaur Municipality'],
            ['district_id' => 12, 'name' => 'Paroha Municipality'],

            // Bagmati Province
            ['district_id' => 13, 'name' => 'Kathmandu Metropolitan'],
            ['district_id' => 13, 'name' => 'Kirtipur Municipality'],

            ['district_id' => 14, 'name' => 'Bhaktapur Municipality'],
            ['district_id' => 14, 'name' => 'Madhyapur Thimi Municipality'],

            ['district_id' => 15, 'name' => 'Lalitpur Metropolitan'],
            ['district_id' => 15, 'name' => 'Godawari Municipality'],

            ['district_id' => 16, 'name' => 'Dhading Municipality'],
            ['district_id' => 16, 'name' => 'Netrawati Municipality'],

            ['district_id' => 17, 'name' => 'Nuwakot Municipality'],
            ['district_id' => 17, 'name' => 'Bidur Municipality'],

            ['district_id' => 18, 'name' => 'Ramechhap Municipality'],
            ['district_id' => 18, 'name' => 'Manthali Municipality'],

            // Gandaki Province
            ['district_id' => 19, 'name' => 'Pokhara Metropolitan'],
            ['district_id' => 19, 'name' => 'Lekhnath Municipality'],

            ['district_id' => 20, 'name' => 'Besisahar Municipality'],
            ['district_id' => 20, 'name' => 'Rainas Municipality'],

            ['district_id' => 21, 'name' => 'Manang Municipality'],
            ['district_id' => 21, 'name' => 'Chame Municipality'],

            ['district_id' => 22, 'name' => 'Mustang Municipality'],
            ['district_id' => 22, 'name' => 'Jomsom Municipality'],

            ['district_id' => 23, 'name' => 'Gorkha Municipality'],
            ['district_id' => 23, 'name' => 'Palungtar Municipality'],

            ['district_id' => 24, 'name' => 'Tanahun Municipality'],
            ['district_id' => 24, 'name' => 'Byas Municipality'],

            // Lumbini Province
            ['district_id' => 25, 'name' => 'Butwal Municipality'],
            ['district_id' => 25, 'name' => 'Devdaha Municipality'],

            ['district_id' => 26, 'name' => 'Kapilvastu Municipality'],
            ['district_id' => 26, 'name' => 'Shivaraj Municipality'],

            ['district_id' => 27, 'name' => 'Tansen Municipality'],
            ['district_id' => 27, 'name' => 'Rambha Municipality'],

            ['district_id' => 28, 'name' => 'Bardaghat Municipality'],
            ['district_id' => 28, 'name' => 'Ramgram Municipality'],

            ['district_id' => 29, 'name' => 'Sandhikharka Municipality'],
            ['district_id' => 29, 'name' => 'Bangad Municipality'],

            ['district_id' => 30, 'name' => 'Resunga Municipality'],
            ['district_id' => 30, 'name' => 'Musikot Municipality'],

            // Karnali Province
            ['district_id' => 31, 'name' => 'Jumla Municipality'],
            ['district_id' => 31, 'name' => 'Chandannath Municipality'],

            ['district_id' => 32, 'name' => 'Dolpa Municipality'],
            ['district_id' => 32, 'name' => 'Thuli Bheri Municipality'],

            ['district_id' => 33, 'name' => 'Simikot Municipality'],
            ['district_id' => 33, 'name' => 'Tila Municipality'],

            ['district_id' => 34, 'name' => 'Kalikot Municipality'],
            ['district_id' => 34, 'name' => 'Raskot Municipality'],

            ['district_id' => 35, 'name' => 'Mugu Municipality'],
            ['district_id' => 35, 'name' => 'Soru Municipality'],

            ['district_id' => 36, 'name' => 'Salyan Municipality'],
            ['district_id' => 36, 'name' => 'Bagchaur Municipality'],

            // Sudurpashchim Province
            ['district_id' => 37, 'name' => 'Baitadi Municipality'],
            ['district_id' => 37, 'name' => 'Dasharathchand Municipality'],

            ['district_id' => 38, 'name' => 'Dadeldhura Municipality'],
            ['district_id' => 38, 'name' => 'Parshuram Municipality'],

            ['district_id' => 39, 'name' => 'Doti Municipality'],
            ['district_id' => 39, 'name' => 'Silgadhi Municipality'],

            ['district_id' => 40, 'name' => 'Dhangadhi Municipality'],
            ['district_id' => 40, 'name' => 'Bhajani Municipality'],

            ['district_id' => 41, 'name' => 'Mahakali Municipality'],
            ['district_id' => 41, 'name' => 'Belauri Municipality'],

            ['district_id' => 42, 'name' => 'Bajhang Municipality'],
            ['district_id' => 42, 'name' => 'Jaya Prithvi Municipality'],
        ];


        foreach ($municipalities as $muni) {
            Municipality::create($muni);
        }
    }
}
