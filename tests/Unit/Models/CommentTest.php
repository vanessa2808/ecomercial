<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Tests\TestCase;

class CommentTest extends TestCase
{
    protected $comment;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->comment = new Comment();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->comment);
    }

    public function test_table_name()
    {
        $this->assertEquals('comments', $this->comment->getTable());
    }

    public function comments_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('comments', [
                'id',
                'user_id',
                'product_id',
                'comment',
                'rate',
            ]),
            1
        );
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'user_id',
            'product_id',
            'comment',
            'rate',
        ], $this->comment->getFillable());
    }

    public function test_key_name()
    {
        $this->assertEquals('id', $this->comment->getKeyName());
    }

    public function test_user_relation()
    {
        $this->belongsTo_relation_test(
            User::class,
            'user_id',
            'id',
            $this->comment->user()
        );
    }

    public function test_product_relation()
    {
        $this->belongsTo_relation_test(
            Product::class,
            'product_id',
            'id',
            $this->comment->product()
        );
    }

}
