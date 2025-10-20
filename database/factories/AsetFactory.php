<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aset>
 */
class AsetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $namaAset = $this->faker->randomElement([
            'Timbangan Digital',
            'Termometer Digital',
            'Micropipette',
            'pH Meter',
            'Centrifuge',
            'Oven Laboratorium',
            'Pressure Gauge',
            'Spectrophotometer',
            'Autoclave',
            'Water Bath',
        ]);

        $merk = $this->faker->randomElement([
            'Ohaus',
            'Fluke',
            'Eppendorf',
            'Hanna',
            'Thermo Fisher',
            'WIKA',
            'Shimadzu',
            'Yamato',
            'Beurer',
            'Sartorius',
        ]);

        $lokasi = $this->faker->randomElement([
            'Lab Kimia',
            'Lab Fisika',
            'Lab Biologi',
            'Workshop',
            'Ruang Kalibrasi'
        ]);

        $status = $this->faker->randomElement(['laik', 'tidak laik']);

        return [
            'kode' => 'AST-' . str_pad($this->faker->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'nama' => $namaAset,
            'merk' => $merk,
            'type' => strtoupper(Str::random(6)),
            'no_seri' => strtoupper(Str::random(8)),
            'lokasi' => $lokasi,
            'status' => $status,
            'waktu_kalibrasi' => Carbon::now()->subDays($this->faker->numberBetween(1, 700)),
        ];
    }
}
