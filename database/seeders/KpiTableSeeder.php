<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KpiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('hr.kpi')->insert([
            [
                'employee' => 4,
                'category' => 1,
                'target_value' => 100,
                'achieved_value' => 90,
                'unit' => 'Unit A',
                'period_fr' => $now->startOfMonth()->toDateString(),
                'period_to' => $now->endOfMonth()->toDateString(),
                'status' => 1,
                'remarks' => 'Remark 1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'employee' => 6,
                'category' => 2,
                'target_value' => 120,
                'achieved_value' => 110,
                'unit' => 'Unit B',
                'period_fr' => $now->startOfMonth()->toDateString(),
                'period_to' => $now->endOfMonth()->toDateString(),
                'status' => 1,
                'remarks' => 'Remark 2',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'employee' => 7,
                'category' => 3,
                'target_value' => 90,
                'achieved_value' => 85,
                'unit' => 'Unit C',
                'period_fr' => $now->startOfMonth()->toDateString(),
                'period_to' => $now->endOfMonth()->toDateString(),
                'status' => 1,
                'remarks' => 'Remark 3',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'employee' => 8,
                'category' => 4,
                'target_value' => 110,
                'achieved_value' => 105,
                'unit' => 'Unit D',
                'period_fr' => $now->startOfMonth()->toDateString(),
                'period_to' => $now->endOfMonth()->toDateString(),
                'status' => 1,
                'remarks' => 'Remark 4',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'employee' => 9,
                'category' => 5,
                'target_value' => 95,
                'achieved_value' => 90,
                'unit' => 'Unit E',
                'period_fr' => $now->startOfMonth()->toDateString(),
                'period_to' => $now->endOfMonth()->toDateString(),
                'status' => 1,
                'remarks' => 'Remark 5',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'employee' => 157,
                'category' => 6,
                'target_value' => 130,
                'achieved_value' => 125,
                'unit' => 'Unit F',
                'period_fr' => $now->startOfMonth()->toDateString(),
                'period_to' => $now->endOfMonth()->toDateString(),
                'status' => 1,
                'remarks' => 'Remark 6',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'employee' => 131,
                'category' => 7,
                'target_value' => 105,
                'achieved_value' => 100,
                'unit' => 'Unit G',
                'period_fr' => $now->startOfMonth()->toDateString(),
                'period_to' => $now->endOfMonth()->toDateString(),
                'status' => 1,
                'remarks' => 'Remark 7',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
