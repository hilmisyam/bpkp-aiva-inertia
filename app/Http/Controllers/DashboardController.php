<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeProfile;
use App\Models\TodayAttendance;
use App\Models\Sp;
use App\Models\Kpi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPegawai = EmployeeProfile::count();
        $kehadiranHariIni = TodayAttendance::where('status', 1)->sum('count');
        $sedangCuti = TodayAttendance::where('status', 3)->sum('count');

        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $sp1Count = Sp::where('sp_type', 1)
            ->whereMonth('created_on', $currentMonth)
            ->whereYear('created_on', $currentYear)
            ->count();

        $sp2Count = Sp::where('sp_type', 2)
            ->whereMonth('created_on', $currentMonth)
            ->whereYear('created_on', $currentYear)
            ->count();

        $kpiData = Kpi::select('unit', 'target_value', 'achieved_value')
            ->whereYear('period_fr', $currentYear)
            ->whereMonth('period_fr', $currentMonth)
            ->get();

        return inertia('Dashboard', [
            'totalPegawai' => $totalPegawai,
            'kehadiranHariIni' => $kehadiranHariIni,
            'sedangCuti' => $sedangCuti,
            'sp1Count' => $sp1Count,
            'sp2Count' => $sp2Count,
            'currentMonth' => Carbon::now()->format('F'),
            'currentYear' => $currentYear,
            'kpiData' => $kpiData,
        ]);
    }

    public function chatbot()
    {
        return inertia('Chatbot');
    }


}