<?php

namespace Tests\Unit\App\Models;

use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\Suggest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    protected $user, $order;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function users_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id',
                'user_name',
                'role_id',
                'phone',
                'email',
                'address',
                'password'
            ]),
            1
        );
    }

    public function test_contains_valid_fillable_properties()
    {
        $user = new User();
        $this->assertEquals([
            'user_name',
            'role_id',
            'phone',
            'email',
            'address',
            'password',
        ], $user->getFillable());
    }

    public function test_contains_valid_hidden_properties()
    {
        $user = new User();
        $this->assertEquals([
            'password',
            'remember_token',
        ], $user->getHidden());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $user = new User([
            'id' => 1,
            'user_name' => 'Rion',
            'role_id' => '1',
            'phone' => 0374222,
            'email' => 'yenrion2@gmail.com',
            'address' => 'Da Nang',
            'password' => '12341234',
        ]);
        $user->save();
        $users = User::find(1)->get();
        $this->assertCount(1, $users);
    }

    public function a_user_has_many_order()
    {
        $user = new User();
        $order = $user->order();
        $this->assertHasManyRelation($order, $user, new Order());
    }

    public function a_user_has_many_favorite()
    {
        $user = new User();
        $favorite = $user->favorites();
        $this->assertHasManyRelation($favorite, $user, new Favorite());
    }

    public function a_user_has_many_suggest()
    {
        $user = new User();
        $suggest = $user->suggests();
        $this->assertHasManyRelation($suggest, $user, new Suggest());
    }

    public function a_user_has_many_comment()
    {
        $user = new User();
        $comment = $user->comments();
        $this->assertHasManyRelation($comment, $user, new Comment());
    }

}
