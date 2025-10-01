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
        Schema::create('help_desk', function (Blueprint $table) {
            $table->id();
            $table->text('keterangan');
            $table->enum('status', ['accept', 'on-progress', 'done'])->default('accept');
            $table->foreignId('pegawai_id');
            $table->timestamps();       


            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('help_desk');
    }
};
