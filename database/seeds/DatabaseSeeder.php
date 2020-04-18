<?php

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
       factory(\App\User::class,5)->create();
       factory(\App\Category::class,10)->create();
       factory(\App\Question::class,10)->create();
       factory(\App\Replay::class,50)->create()->each(function ($replay){
           $replay->likes()->save(factory(\App\Like::class)->make());
       });
    }
}
