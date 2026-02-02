<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;

    protected $fillable = ['ward_no', 'municipality_id'];

    // A Ward belongs to a Municipality
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
}
