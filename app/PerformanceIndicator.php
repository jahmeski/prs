<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerformanceIndicator extends Model
{
    protected $fillable = [
        'name', 'agency_id', 'year_id'
    ];

    public function agency() {
        return $this->belongsTo(Agency::class);
    }

    public function year() {
        return $this->belongsTo(Year::class);
    }
}
