<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function performanceIndicators() {
        return $this->hasMany(PerformanceIndicator::class);
    }
}
