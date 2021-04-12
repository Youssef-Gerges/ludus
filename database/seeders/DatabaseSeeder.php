<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(BrandCategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductImageSeeder::class);
        $this->call(ProductVaritySeeder::class);
        $this->call(DiscountSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(PromoCodeSeeder::class);
        $this->call(addressSeeder::class);
        $this->call(InvoiceSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
