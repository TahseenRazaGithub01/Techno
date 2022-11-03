<?php

use Illuminate\Database\Seeder;
use App\Models\Orders;
use Faker\Factory as Faker;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1; $i<=20; $i++){
            
            $order = new Orders;
            $order->user_id = App\User::all()->random()->id;
            $order->amount = $faker->numberBetween(100,300);
            $order->save();
        }
    }
}
