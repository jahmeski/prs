<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accomplishment extends Model
{
    protected $fillable = [
        'number_of_accomplishments', 'quarter', 'remarks', 'performance_indicator_id'
    ];

    public function performanceIndicator() {
        return $this->belongsTo(PerformanceIndicator::class);
    }
}
