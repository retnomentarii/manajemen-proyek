<?php

namespace Database\Factories;
use App\Models\JenisProject;
use Illuminate\Database\Eloquent\Factories\Factory;

class JenisProjectFactory extends Factory
{
    protected $model = JenisProject::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
        ];
    }
}
