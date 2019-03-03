<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $fillable = [
        'number_of_targets', 'quarter', 'remarks', 'performance_indicator_id'
    ];

    public function performanceIndicator() {
        return $this->belongsTo(PerformanceIndicator::class);
    }
}
