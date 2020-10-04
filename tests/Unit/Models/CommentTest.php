<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;
    protected $comment;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
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

    public function test_contains_valid_fillable_properties()
    {
        $comment = new Comment();
        $this->assertEquals([
            'user_id',
            'product_id',
            'comment',
            'rate',
        ], $comment->getFillable());
    }

    public function a_comment_belongs_to_user()
    {
        $comment = new Comment();
        $user_id = $comment->user();
        $this->assertBelongsToRelation($user_id, $comment, new Comment());
    }

    public function a_comment_belongs_to_product()
    {
        $comment = new Comment();
        $product_id = $comment->user();
        $this->assertBelongsToRelation($product_id, $comment, new Comment());
    }

}
