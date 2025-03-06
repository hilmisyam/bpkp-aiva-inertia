<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sp extends Model
{
    protected $table = 'hr.sp';
    public $timestamps = false;

    protected $fillable = [
        'sp_type',
        'employee',
        'valid_fr',
        'valid_thru',
        'file',
        'description',
        'created_on',
        'updated_on'
    ];
}
