<?php

namespace Tests\Feature\app\Libraries;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Libraries\Helpers;

class HelpersTest extends TestCase
{
    /** @test
     * Valid get data 
     *
     * @return void
     */
    public function valid_all_posts_request()
    {
        $helper = new Helpers();
        $response = $helper->consumeApi('/posts');
        $data = json_decode($response->content(), true);
        $this->assertArrayHasKey('data', $data);
    }

    /** @test
     * Valid get data by one post
     *
     * @return void
     */
    public function valid_one_posts_request()
    {
        $helper = new Helpers();
        $response = $helper->consumeApi('/posts/1');
        $data = json_decode($response->content(), true);
        $this->assertArrayHasKey('data', $data);
    }

    /** @test
     * Valid get data comment by one post
     *
     * @return void
     */
    public function valid_comment_posts_request()
    {
        $helper = new Helpers();
        $response = $helper->consumeApi('/posts/1/comments');
        $data = json_decode($response->content(), true);
        $this->assertArrayHasKey('data', $data);
    }
}