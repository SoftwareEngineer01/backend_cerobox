<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl(),
            'id_type_service' => $this->faker->numberBetween(1,2),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'observations' => $this->faker->text,
        ];
    }
}
