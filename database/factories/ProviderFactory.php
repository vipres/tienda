<?php

namespace Database\Factories;

use App\Models\Provider;
use Facade\Ignition\Support\FakeComposer;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProviderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Provider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [

        'name' => $this->faker->company(),
        'email' => $this->faker->companyEmail(),
        'cif' => $this->faker->dni(),
        'address' =>$this->faker->streetAddress(),
        'phone' => $this->faker->mobileNumber()
        ];
    }
}
