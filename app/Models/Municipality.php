<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'district_id'];

    // A Municipality belongs to a District
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    // A Municipality has many Wards
    public function wards()
    {
        return $this->hasMany(Ward::class);
    }
}
