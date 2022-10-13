<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * 
     */
    protected $model = Contact::class;
    public function definition()     
    {
        return [
            'company' => $this->faker->jobTitle(),
            'name' => $this->faker->userName(),
            'tel' => $this->faker->phoneNumber(),
            'email'  => $this->faker->unique()->safeEmail(),
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement( ['male','female'] ),
            'job' => $this->faker->randomElement( ['engineer','electricalWorker','Architect'] ),
            'content' => $this->faker->text(100),
            //対応状況
            'status' => $this->faker->randomElement( ['no_response','now_response','responsed'] ),
            //お問い合わせ備考            
            'remarks'=> $this->faker->text(100) 
        ];
    }
}
