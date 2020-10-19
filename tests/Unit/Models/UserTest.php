<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Suggest;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->user);
    }

    public function test_table_name()
    {
        $this->assertEquals('users', $this->user->getTable());
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
                'password',
                'provider',
                'provider_id',
            ]),
            1
        );
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'user_name',
            'role_id',
            'phone',
            'email',
            'address',
            'password',
            'provider',
            'provider_id',
        ], $this->user->getFillable());
    }

    public function test_key_name()
    {
        $this->assertEquals('id', $this->user->getKeyName());
    }

    public function test_hidden()
    {
        $this->assertEquals([
            'password',
            'remember_token',
        ], $this->user->getHidden());
    }

    public function test_orders_relation()
    {
        $this->hasMany_relation_test(
            Order::class,
            'user_id',
            $this->user->orders()
        );
    }

    public function test_favorites_relation()
    {
        $this->hasMany_relation_test(
            Favorite::class,
            'user_id',
            $this->user->favorites()
        );
    }

    public function test_suggests_relation()
    {
        $this->hasMany_relation_test(
            Suggest::class,
            'user_id',
            $this->user->suggests()
        );
    }

    public function test_comments_relation()
    {
        $this->hasMany_relation_test(
            Comment::class,
            'user_id',
            $this->user->comments()
        );
    }

}
