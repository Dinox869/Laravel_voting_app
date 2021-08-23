<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
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

        User::factory(10)->create();
        Category::factory()->create(['name'=>'Sports']);
        Category::factory()->create(['name'=>'Politics']);
        Category::factory()->create(['name'=>'Couples']);
        Category::factory()->create(['name'=>'Tech']);

        Status::factory()->create(['name'=>'Open','classes'=>'bg-gray-200']);
        Status::factory()->create(['name'=>'In Progress','classes'=>'bg-green text-white']);
        Status::factory()->create(['name'=>'Closed','classes'=>'bg-red text-white']);
        Status::factory()->create(['name'=>'Implemented','classes'=>'bg-green text-white']);
        Status::factory()->create(['name'=>'Considering','classes'=>'bg-yellow text-white']);


        Idea::factory(100)->create();

        foreach (range(1,10) as $user_id){

            foreach (range(1,100)as $idea_id){
                if($idea_id % 2 === 0 ){
                    Vote::factory()->create([
                        'user_id'=> $user_id,
                        'idea_id'=>$idea_id
                    ]);
                }
            }
        }
    }
}
