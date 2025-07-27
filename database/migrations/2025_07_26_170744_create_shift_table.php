<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shift', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('nama');
            $table->time('start_time');
            $table->time('end_time');
            $table->time('break_start');
            $table->time('break_end');
            $table->time('jam_kerja');
            // $table->time('jam_kerja');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift');
    }
};
