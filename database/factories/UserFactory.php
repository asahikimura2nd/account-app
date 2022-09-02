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

            // 'email' => $this->faker->unique()->safeEmail(),
            'user_id'=>$this->faker->uuid(),
            'user_name'=>$this->faker->lastName(),
            'user_email'=>$this->faker->email(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'user_tel'=>$this->faker->phoneNumber(),
            'user_prefectures'=>$this->faker->city(),
            'user_city'=>$this->faker->streetAddress(),
            'user_address_and_building'=>$this->faker->buildingNumber(),
            //詳細
            'user_company'=>$this->faker->company(),
            'user_name_katakana'=>$this->faker->lastName(),
            'user_password'=>$this->faker->lastName(),
            'user_postcode'=>$this->faker->postcode(),
            'content'=>$this->faker->text(),
            
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
