<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Product;
use App\Models\Suggest;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    protected $category;

    public function testExample()
    {
        $this->assertTrue(true);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = new Category();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->category);
    }

    public function test_table_name()
    {
        $this->assertEquals('categories', $this->category->getTable());
    }

    public function categories_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('categories', [
                'id',
                'category_name',
                'parent_id',
            ]),
            1
        );
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'category_name',
            'parent_id',
        ], $this->category->getFillable());
    }

    public function test_key_name()
    {
        $this->assertEquals('id', $this->category->getKeyName());
    }

    public function test_products_relation()
    {
        $this->hasMany_relation_test(
            Product::class,
            'category_id',
            $this->category->products()
        );
    }

    public function test_suggests_relation()
    {
        $this->hasMany_relation_test(
            Suggest::class,
            'category_id',
            $this->category->suggests()
        );
    }

    public function test_parent_relation()
    {
        $this->belongsTo_relation_test(
            Category::class,
            'parent_id',
            'id',
            $this->category->parent()
        );
    }

    public function test_childrens_relation()
    {
        $this->hasMany_relation_test(
            Category::class,
            'parent_id',
            $this->category->childrens()
        );
    }

}
