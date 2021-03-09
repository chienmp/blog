<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Tests\ModelTestCase;

class CommentTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
        $this->comment = new Comment();
    }

    public function test_model_configuration()
    {
        $this->assertEquals([
            'comment',
        ], $this->comment->getFillable());
    }

    public function test_post_relation()
    {
        $comment = new Comment();
        $post = $comment->post();
        $this->assertBelongsToRelation($post, $comment, new Post(), 'post_id');
    }

    public function test_user_relation()
    {
        $comment = new Comment();
        $user = $comment->user();
        $this->assertBelongsToRelation($user, $comment, new User(), 'user_id');
    }
}
