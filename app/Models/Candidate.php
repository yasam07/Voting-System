<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Province;
use App\Models\District;
use App\Models\Municipality;
use App\Models\Ward;

class Candidate extends Model
{
    protected $fillable = [
        'name',
        'email',
        'citizenship',
        'gender',
        'is_active',
        'party_id',
        'post_id',
        'province_id',
        'district_id',
        'municipality_id',
        'ward_id',
        
    ];

    // Relationship to Party
    public function party()
    {
        return $this->belongsTo(Party::class);
    }

    // Relationship to Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relationships to Location
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
