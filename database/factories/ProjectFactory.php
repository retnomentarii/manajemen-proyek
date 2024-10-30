<?php

namespace Database\Factories;

use App\Models\JenisProject;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'member_id' => User::inRandomOrder()->first()?->id ?? User::factory()->create()->id,
            'tipe_project_id' => JenisProject::inRandomOrder()->first()?->id ?? JenisProject::factory()->create()->id,
            'name' => $this->faker->words(3, true),
            // 'tipe_project' => $this->faker->word,
            'deadline' => $this->faker->date(),
            'keterangan' => $this->faker->sentence,
            'harga' => $this->faker->numberBetween(100000, 1000000),
            'status' => $this->faker->randomElement(['new', 'in_progress', 'completed']),
        ];
    }
}
