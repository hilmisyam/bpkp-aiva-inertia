<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hr.sp', function (Blueprint $table) {
            $table->id();
            $table->integer('sp_type'); // 1: sp 1, 2: sp 2, 3: sp 3
            $table->unsignedBigInteger('employee');
            $table->date('valid_fr');
            $table->date('valid_thru');
            $table->text('file')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('created_on')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_on')->default(DB::raw('CURRENT_TIMESTAMP'))->nullable();

            // Define foreign key constraint
            $table->foreign('employee')->references('id')->on('hr.employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hr.sp');
    }
};
