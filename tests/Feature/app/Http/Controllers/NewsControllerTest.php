<?php

namespace Tests\Feature\app\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /** @test
     * Valid /post route
     *
     * @return void
     */
    public function valid_posts_route()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }
}