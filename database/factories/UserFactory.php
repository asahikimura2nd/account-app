<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'tel' => $this->faker->phoneNumber(),
            'prefectures' => $this->faker->city(),
            'city' => $this->faker->streetAddress(),
            'address_and_building' => $this->faker->buildingNumber(),
            //詳細
            'company' => $this->faker->company(),
            'name_katakana' => $this->faker->lastName(),
            'password' => $this->faker->lastName(),
            'postcode' => $this->faker->postcode(),
            'content' => $this->faker->text(),
        ];
            
        
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
