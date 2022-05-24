<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::query()->create([
            "name" => "iPhone 8",
            "price" => 800
        ]);

        Product::query()->create([
            "name" => "iPhone 10",
            "price" => 900
        ]);

        Product::query()->create([
            "name" => "iPhone 11",
            "price" => 1000
        ]);

        Product::query()->create([
            "name" => "iPhone 12",
            "price" => 1100
        ]);

        Product::query()->create([
            "name" => "iPhone 13",
            "price" => 1200
        ]);
    }
}
