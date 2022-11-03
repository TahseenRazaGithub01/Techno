<?php

use Illuminate\Database\Seeder;
use App\Models\Posts;
use App\Models\Likes;
use Faker\Factory as Faker;

class LikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=1; $i<=10; $i++){

            $like = new Likes;
            $like->user_id = App\User::all()->random()->id;
            $like->posts_id = Posts::all()->random()->id;
            $like->save();

        }
        
    }
}
