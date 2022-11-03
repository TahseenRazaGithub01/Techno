<?php

use Illuminate\Database\Seeder;

use App\Models\PostMetas;

class PostMetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i=1; $i<=20; $i++){
            $meta = new PostMetas;
            $meta->posts_id = $i;
            $meta->meta_description = "Testing Description ".$i;
            $meta->meta_keywords = "Testing Keywords - ".$i;
            $meta->save();
        }
        
        

    }
}
