<?php

use Illuminate\Database\Seeder;
use App\Models\Tags;
use Faker\Factory as Faker;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 1; $i<=10; $i++){
            
            $tag = new Tags;
            $tag->name = $faker->name;
            $tag->save();
        }
    }
}
