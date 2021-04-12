<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'describtion' => $this->faker->paragraph(8),
            'short_describtion' => $this->faker->paragraph(1),
            'price' => $this->faker->numberBetween(0, 10000),
            'stock' => $this->faker->numberBetween(0, 10000),
            'code' => $this->faker->numberBetween(0, 100000),
            'featured' => $this->faker->boolean,
            'brand_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
