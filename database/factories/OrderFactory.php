<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductVarity;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'invoice_id' => $this->faker->numberBetween(1, 5),
            'product_id' => $this->faker->numberBetween(1, 30),
            'count' => $this->faker->numberBetween(0, 10000),
            'price' => $this->faker->numberBetween(0, 10000),
        ];
    }
}
