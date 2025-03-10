<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodayAttendance extends Model
{
    protected $table = 'hr.v_today_attendance';
    public $timestamps = false;
}
