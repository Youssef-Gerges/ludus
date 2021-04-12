<?php

namespace Database\Seeders;

use App\Models\ProductVarity;
use Illuminate\Database\Seeder;

class ProductVaritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductVarity::factory()->count(60)->create();
    }
}
