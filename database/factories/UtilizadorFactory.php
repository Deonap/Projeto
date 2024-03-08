<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utilizador>
 */
class UtilizadorFactory extends Factory
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
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password('5'),
            'telemovel' => fake()->phoneNumber(),
            'funcoes' => fake()->randomElement(['Administrador', 'Técnico']),
            'status' => fake()->randomElement(['Ativo', 'Inativo']),
        ];
    }
}
