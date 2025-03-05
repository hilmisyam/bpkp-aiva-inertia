<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeProfile;
use App\Models\TodayAttendance;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPegawai = EmployeeProfile::count();
        $kehadiranHariIni = TodayAttendance::where('status', 1)->sum('count');
        $sedangCuti = TodayAttendance::where('status', 3)->sum('count');

        return inertia('Dashboard', [
            'totalPegawai' => $totalPegawai,
            'kehadiranHariIni' => $kehadiranHariIni,
            'sedangCuti' => $sedangCuti,
        ]);
    }
}
