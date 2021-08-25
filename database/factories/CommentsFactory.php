<?php

namespace Database\Factories;

use App\Models\Comments;
use App\Models\Idea;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentsFactory extends Factory
{

    protected $model = Comments::class;

    public function definition()
    {
        return [
            'body'=> $this->faker->paragraph(4),
            'user_id'=> $this->faker->numberBetween(1,4),
            'idea_id'=> $this->faker->numberBetween(1,10)
        ];
    }
}
