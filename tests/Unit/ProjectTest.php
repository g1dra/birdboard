<?php

namespace Tests\Unit;

use App\Models\Project;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /** @test */
    public function a_project_has_a_path()
    {
        $project = Project::factory()->create();
        $this->assertEquals('/projects/' . $project->id, $project->path(),);
    }
}
