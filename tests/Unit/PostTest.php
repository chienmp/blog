<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\ModelTestCase;
use App\Models\Post;
use App\Models\Comment;

class PostTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
        $this->post = new Post();
    }

    public function test_model_configuration()
    {
        $this->assertEquals([
            'body',
            'title'
        ], $this->post->getFillable());
    }

    public function test_tags_relation()
    {
        $post = new Post();
        $tag = $post->tags();
        $this->assertBelongsToManyRelation($tag, 'post_id', 'tag_id');
    }

    public function test_categories_relation(){
        $post = new Post();
        $category = $post->categories();
        $this->assertBelongsToManyRelation($category, 'post_id', 'category_id');
    }

    public function test_like_relation()
    {
        $post = new Post();
        $like = $post->favorite_to_users();
        $this->assertBelongsToManyRelation($like, 'post_id', 'user_id');
    }

    public function test_comments_relation()
    {
        $comment = $this->post->comments();
        $this->assertHasManyRelation($comment, $this->post, new Comment());
    }
}
