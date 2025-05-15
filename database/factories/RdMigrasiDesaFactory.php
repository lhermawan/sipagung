<?php

namespace Database\Factories;

use App\Models\RdMigrasiDesa;
use Illuminate\Database\Eloquent\Factories\Factory;

class RdMigrasiDesaFactory extends Factory
{
    protected $model = RdMigrasiDesa::class;

    public function definition()
    {
        return [
            'tahun' => $this->faker->year(),
            'jenis' => $this->faker->randomElement(['Jenis A', 'Jenis B', 'Jenis C']),
            'masuk' => $this->faker->numberBetween(100, 500),
            'keluar' => $this->faker->numberBetween(50, 300),
            'komuter' => $this->faker->numberBetween(10, 100),
            'musiman' => $this->faker->numberBetween(5, 50),
        ];
    }
}
