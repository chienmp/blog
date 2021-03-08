<?php

namespace Tests\Unit;

use App\Models\Role;
use PHPUnit\Framework\TestCase;
use App\Models\User;
use Tests\ModelTestCase;

class RoleTest extends ModelTestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();
        $this->role = new Role();
    }

    public function test_users_relation()
    {
        $user = $this->role->users();
        $this->assertHasManyRelation($user, $this->role, new User());
    }
}
