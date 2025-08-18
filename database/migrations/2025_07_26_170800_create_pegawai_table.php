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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama');
            $table->string('alamat');
            $table->date('tgl_lahir');
            $table->string('email');
            $table->string('no_hp');
            $table->enum('jk', ['Pria', 'Wanita']);
            $table->foreignId('department_id');
            $table->foreignId('jabatan_id');
            $table->foreignId('work_type_id');
            $table->foreignId('status_pegawai_id');
            $table->string('foto');
            $table->string('password');


            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
            $table->foreign('work_type_id')->references('id')->on('work_type')->onDelete('cascade');
            $table->foreign('status_pegawai_id')->references('id')->on('status_pegawai')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
