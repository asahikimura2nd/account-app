<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = User::class;
    public function definition()
    {
        $postcode = mt_rand(1000,9999);
        $postcode = substr($postcode,0,3)."-".substr($postcode,0,4);
        $count = mt_rand(1,47);
        $katakana = Str::random(6,10);
        return [
            'company' => $this->faker->jobTitle(),
            'name_katakana' => $katakana,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'tel' => $this->faker->phoneNumber(),
            'postcode' => $postcode,
            'prefectures' => $this->faker->randomElement( [ $count ] ),
            'city' => $this->faker->randomElement( ['a','b','c','d','e'] ),
            'address_and_building' => $this->faker->buildingNumber(),
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
