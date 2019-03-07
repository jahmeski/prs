<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $fillable = [
        'first_quarter', 'second_quarter', 'third_quarter', 'fourth_quarter', 'total', 'performance_indicator_id'
    ];

    public function performanceIndicator() {
        return $this->belongsTo(PerformanceIndicator::class);
    }
}
