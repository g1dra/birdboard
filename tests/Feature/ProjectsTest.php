<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_project()
    {
        // ako napravimo post request koji kreira postove treba da ga detektujemo u bazi i u browseru
        $this->withoutExceptionHandling();
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }
    /** @test */
    public function a_user_can_view_a_project()
    {
        $this->withoutExceptionHandling();

        $project = factory('App\Project')->create();
        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }
    /** @test */
    public function a_project_requires_a_title()
    {
        $attributes = factory('App\Project')->raw(['title' => '']);
        $this->post('projects', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $attributes = factory('App\Project')->raw(['description' => '']);
        $this->post('projects', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function a_project_requires_an_owner()
    {
        $this->withoutExceptionHandling();
        
        $attributes = factory('App\Project')->raw();

        $this->post('/projects', $attributes)->assertSessionHasErrors('owner');
    }
}
