<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transacao>
 */
class TransacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // 'data' => '2023-10-01',
        // 'tipo' => 'entrada',
        // 'descricao' => 'Salário',
        // 'valor' => 5000.00,
        // 'categoria' => 'Renda',
        // 'repeticao' => false,
        // 'fixo' => true,
        // 'user_id' => 1,
        
        return [
            'tipo' => $this->faker->randomElement(['entrada', 'saida']),
            'descricao' => $this->faker->sentence(),
            'valor' => $this->faker->randomFloat(2, 10, 1000),
            'categoria' => $this->faker->word(),
            'repeticao' => $this->faker->boolean(),
            'fixo' => $this->faker->boolean(),
            'user_id' => User::factory(), // Assuming a user with ID 1 exists
            'data' => $this->faker->dateTimeThisYear(),
        ];
    }
}
