<?php

use Illuminate\Database\Seeder;
use App\Models\Posts;
use Faker\Factory as Faker;

class PostsSeeder extends Seeder
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
            
            $post = new Posts;
            $post->user_id = App\User::all()->random()->id;
            $post->name = $faker->name;
            $post->description = $faker->text(300);
            $post->save();
        }

    }
}
