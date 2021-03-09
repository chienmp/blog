<?php

namespace Tests\Unit;

use App\Models\Category;
use PHPUnit\Framework\TestCase;
use Tests\ModelTestCase;

class CategoryTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
        $this->tag = new Category();
    }

    public function test_posts_relation()
    {
        $category = new Category();
        $post = $category->posts();
        $this->assertBelongsToManyRelation($post, 'category_id', 'post_id');
    }
}
