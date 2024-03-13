<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projeto>
 */
class ProjetoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'cliente_id' => fake()->numberBetween(1, 25),
            'tipo' => fake()->randomElement(['Software', 'Redes Sociais', 'SEO', 'Loja Online', 'Integração', 'Website']),
            'dataLimite' => fake()->date('Y-m-d'),
            'supervisor_id' => fake()->numberBetween(1, 15),
            'responsavel_id' => fake()->numberBetween(1, 15),
            'obs' => fake()->paragraph(5),
        ];
    }
}
