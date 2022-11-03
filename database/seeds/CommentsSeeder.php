<?php

use Illuminate\Database\Seeder;
use App\Models\Comments;
use Faker\Factory as Faker;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=1; $i<=50; $i++){
            $comment = new Comments;
            $comment->user_id = App\User::all()->random()->id;
            $comment->posts_id = App\Models\Posts::all()->random()->id;
            $comment->comment = $faker->text(300);
            $comment->save();
        }
        
    }
}
