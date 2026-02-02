<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ward;

class WardSeeder extends Seeder
{
    public function run()
    {
        $wards = [];

        for ($municipalityId = 1; $municipalityId <= 84; $municipalityId++) { // 42 districts x2 municipalities = 84
            for ($wardNo = 1; $wardNo <= 5; $wardNo++) {
                $wards[] = [
                    'municipality_id' => $municipalityId,
                    'ward_no' => $wardNo
                ];
            }
        }


        foreach ($wards as $ward) {
            Ward::create($ward);
        }
    }
}
