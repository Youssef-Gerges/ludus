<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Invoice;
use App\Models\User;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'total_price' => $this->faker->numberBetween(0, 10000),
            'shipping_fee' => $this->faker->numberBetween(0, 10000),
            'promo' => $this->faker->word,
            'code' => $this->faker->numberBetween(0, 10000),
            'discount' => $this->faker->randomFloat(2, 0, 1),
            'status' => $this->faker->numberBetween(0, 3),
            'address_id' => 1,
        ];
    }
}
