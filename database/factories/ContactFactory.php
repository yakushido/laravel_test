<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     * 
     * @var
     * 
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'gender' => $this ->faker->randomElement($array = ['1', '2']),
            'email' => $this ->faker->safeEmail(),
            'postcode'=> $this->faker->regexify('[1-9]{3}-[0-9]{4}'),
            'address'=>$this->faker->address(),
            'building_name'=>$this->faker->secondaryAddress(),
            'opinion'=>$this->faker->realText(100),
            'created_at'=>$this->faker->date($format = 'Y-m-d', $max = 'now')
        ];
    }
}
