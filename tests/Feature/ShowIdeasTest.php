<?php

namespace Tests\Feature;

use App\Models\Idea;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  public function list_0f_ideas_shows_on_main_page(){

      $ideaOne = Idea::factory()->create(
          [
              'title'=> 'This is title one',
              'description'=> 'This is the description for title one'
          ]);

      $ideaTwo = Idea::factory()->create(
          [
              'title'=> 'This is title two',
              'description'=> 'This is the description for title two'
          ]);


      $response = $this->get(route('idea.index'));

      $response->assertSuccessful();

      $response->assertSee($ideaOne->title);
      $response->assertSee($ideaTwo->description);
  }

  /** @test */
  public function single_idea_shows_correctly_on_the_show_page(){
      $idea = Idea::factory()->create([
          'title'=>'This is the ieda',
          'description'=>'This is the description'
      ]);

      $response = $this->get(route('idea.show',$idea ));

      $response->assertSuccessful();
      $response->assertSee($idea->title);
      $response->assertSee($idea->description);
  }

}
