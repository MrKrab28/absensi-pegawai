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
            $table->string('email');
            $table->string('no_hp');
            $table->date('tgl_lahir');
            $table->enum('jk', ['Pria', 'Wanita']);
            $table->string('Alamat');
            $table->foreignId('department_id');
            $table->foreignId('jabatan_id');
            $table->foreignId('work_type_id');
            $table->string('foto');



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
