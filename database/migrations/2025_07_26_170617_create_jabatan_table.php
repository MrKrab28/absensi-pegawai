<?php

use App\Models\Jabatan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('nama');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });

        $jabatan = new Jabatan();
        $jabatan->code = '1';
        $jabatan->nama = 'Dokter';
        $jabatan->deskripsi = 'Dokter Umum';
        $jabatan->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatan');
    }
};
