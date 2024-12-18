<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama'=>fake()->name(),
            'nisn'=>fake()->unique()->numerify('##########'),
            'tempat_lahir'=>fake()->city(),
            'tingkat_rombel'=>fake()->sentence(),
            'umur'=>fake()->numberBetween(5,13).'tahun'.fake()->numberBetween(1,12).'bulan',
            'status'=>fake()->randomElement(['Aktif,Tidak Aktif']),
            'jenis_kelamin'=>fake()->randomElement(['Laki-laki','Perempuan']),
            'alamat'=>fake()->address(),
            'no_hp'=>fake()->numerify('############'),
            'kebutuhan _khusus'=>fake()->sentence(),
            'disabilitas'=>fake()->sentence(),
            'nomor_kip'=>fake()->numerify('##########'),
            'nama_ayah'=>fake()->name(),
            'nama_ibu'=>fake()->name(),
            'nama_wali'=>fake()->name(),
        ];
    }
}
