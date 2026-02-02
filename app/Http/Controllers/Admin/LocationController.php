<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Ward;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function districts($provinceId)
    {
        $districts = District::where('province_id', $provinceId)->get();
        return response()->json($districts);
    }

    public function municipalities($districtId)
    {
        $municipalities = Municipality::where('district_id', $districtId)->get();
        return response()->json($municipalities);
    }

    public function wards($municipalityId)
    {
        $wards = Ward::where('municipality_id', $municipalityId)->get();
        return response()->json($wards);
    }
}

