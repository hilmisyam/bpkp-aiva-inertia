<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('hr.sp')->insert([
            [
                'sp_type' => 1,
                'employee' => 4,
                'valid_fr' => $now->subDays(10)->toDateString(),
                'valid_thru' => $now->addDays(20)->toDateString(),
                'file' => 'file1.pdf',
                'description' => 'SP1 for employee 1',
                'created_on' => $now,
                'updated_on' => $now,
            ],
            [
                'sp_type' => 2,
                'employee' => 6,
                'valid_fr' => $now->subDays(5)->toDateString(),
                'valid_thru' => $now->addDays(25)->toDateString(),
                'file' => 'file2.pdf',
                'description' => 'SP2 for employee 2',
                'created_on' => $now,
                'updated_on' => $now,
            ],
            [
                'sp_type' => 1,
                'employee' => 7,
                'valid_fr' => $now->subDays(15)->toDateString(),
                'valid_thru' => $now->addDays(15)->toDateString(),
                'file' => 'file3.pdf',
                'description' => 'SP1 for employee 3',
                'created_on' => $now,
                'updated_on' => $now,
            ],
            [
                'sp_type' => 2,
                'employee' => 8,
                'valid_fr' => $now->subDays(20)->toDateString(),
                'valid_thru' => $now->addDays(10)->toDateString(),
                'file' => 'file4.pdf',
                'description' => 'SP2 for employee 4',
                'created_on' => $now,
                'updated_on' => $now,
            ],
        ]);
    }
}
