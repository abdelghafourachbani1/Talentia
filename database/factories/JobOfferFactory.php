<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobOffer>
 */
class JobOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(5),
            'type_contrat' => fake()->randomElement(['CDI', 'CDD', 'Stage', 'Freelance']),
            'entreprise' => fake()->company(),
            'image' => null,
        ];
    }

}
