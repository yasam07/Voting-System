<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Ward;

class Voter extends Model
{
    protected $fillable = [
        'name',
        'email',
        'citizenship',
        'voter_id',
        'province_id',
        'district_id',
        'municipality_id',
        'ward_id',
        'gender',
    ];
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }
}
