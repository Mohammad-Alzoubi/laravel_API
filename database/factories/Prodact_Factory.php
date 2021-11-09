<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Prodact_Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->facker->name,
            'slug'        => $this->facker->name,
            'price'       => "100.25",
            'category_id' => rand(1, 10),
        ];
    }
}
