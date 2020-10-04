<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Suggest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SuggestTest extends TestCase
{
    use RefreshDatabase;
    protected $suggest;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function suggests_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('suggests', [
                'id',
                'product_name',
                'product_image',
                'description',
                'reason',
                'category_id',
                'status',
            ]),
            1
        );
    }

    public function test_contains_valid_fillable_properties()
    {
        $suggest = new Suggest();
        $this->assertEquals([
            'user_id',
            'product_name',
            'product_image',
            'description',
            'reason',
            'category_id',
            'status',
        ], $suggest->getFillable());
    }

    public function a_suggest_belongs_to_user()
    {
        $suggest = new Suggest();
        $user_id = $suggest->user();
        $this->assertBelongsToRelation($user_id, $suggest, new Suggest());
    }

    public function a_comment_belongs_to_category()
    {
        $suggest = new Comment();
        $category_id = $suggest->user();
        $this->assertBelongsToRelation($category_id, $suggest, new Suggest());
    }

}
