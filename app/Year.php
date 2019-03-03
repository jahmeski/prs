<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = [
        'year'
    ];

    public function performanceIndicators() {
        return $this->hasMany(PerformanceIndicator::class);
    }
}
