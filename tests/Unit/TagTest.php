<?php

namespace Tests\Unit;

use App\Models\Tag;
use PHPUnit\Framework\TestCase;
use Tests\ModelTestCase;

class TagTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function setUp() : void
    {
        parent::setUp();
        $this->tag = new Tag();
    }

    public function test_model_configuration()
    {
        $this->assertEquals([
            'name',
        ], $this->tag->getFillable());
    }

    public function test_posts_relation()
    {
        $tag = new Tag();
        $post = $tag->posts();
        $this->assertBelongsToManyRelation($post, 'tag_id', 'post_id');
    }
}
