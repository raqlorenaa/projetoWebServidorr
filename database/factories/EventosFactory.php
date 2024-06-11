<?php

namespace Database\Factories;

use App\Models\Eventos;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Eventos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'eventoId' => $this->faker->unique()->randomNumber(),
            'user_id' => User::factory(), // Usando a factory do User para criar o user_id
            'orcamento' => $this->faker->randomFloat(2, 1000, 10000),
            'nome_evento' => $this->faker->sentence(3),
            'desc_evento' => $this->faker->sentence(10),
            'data_evento' => $this->faker->date(),
            'local_evento' => $this->faker->city,
            'info_contato' => $this->faker->email,
            'status_proposta' => $this->faker->randomElement(['esperando análise', 'rejeitado', 'em contato']),
        ];
    }
}
