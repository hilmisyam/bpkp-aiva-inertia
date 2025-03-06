<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    protected $table = 'hr.kpi';
    public $timestamps = true;

    protected $fillable = [
        'employee',
        'category',
        'target_value',
        'achieved_value',
        'unit',
        'period_fr',
        'period_to',
        'status',
        'performance',
        'remarks',
        'created_at',
        'updated_at'
    ];
}
