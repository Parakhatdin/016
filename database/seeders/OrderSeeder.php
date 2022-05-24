<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order1 = Order::query()->create(["status" => 1, "user_id" => 1]);
        $order1->products()->attach([
            1 => ["quantity" => 4],
            3 => ["quantity" => 2],
            4 => ["quantity" => 1],
        ]);

        $order2 = Order::query()->create(["status" => 2, "user_id" => 1]);
        $order2->products()->attach([
            2 => ["quantity" => 3],
            3 => ["quantity" => 2],
            5 => ["quantity" => 4],
        ]);
        $order3 = Order::query()->create(["status" => 1, "user_id" => 1]);
        $order3->products()->attach([
            1 => ["quantity" => 4],
            5 => ["quantity" => 2],
            4 => ["quantity" => 1],
        ]);
        $order4 = Order::query()->create(["status" => 0, "user_id" => 1]);
        $order4->products()->attach([
            2 => ["quantity" => 4],
            3 => ["quantity" => 2],
            4 => ["quantity" => 1],
        ]);
        $order5 = Order::query()->create(["status" => 3, "user_id" => 1]);
        $order5->products()->attach([
            1 => ["quantity" => 4],
            5 => ["quantity" => 20],
            4 => ["quantity" => 1],
        ]);
    }
}
