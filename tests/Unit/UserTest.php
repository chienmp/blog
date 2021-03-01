<?php

namespace Tests\Unit;

use App\Models\Comment;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\ModelTestCase;
use Tests\TestCase;

class UserTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function setUp(): void
    {
        parent::setUp();

        $this->user = new User();
    }
    public function test_model_configuration()
    {
        $this->assertEquals([
            'name', 'email', 'password',
        ], $this->user->getFillable());

    }

    public function test_comments_relation()
    {
        $comment = $this->user->comments();
        $this->assertHasManyRelation($comment, $this->user, new Comment());
    }

    public function test_role_relation()
    {
        $user = new User();
        $role = $user->role();
        $this->assertBelongsToRelation($role, $user, new Role(), 'role_id');
    }

    public function test_like_relation()
    {
        $user = new User();
        $like = $user->favorite_posts();
        $this->assertBelongsToManyRelation($like, 'user_id', 'post_id');
    }
}
