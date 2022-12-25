<?php

namespace App\Dao;

use App\Contracts\Dao\CategoryDaoInterface;
use App\Models\Category;

/**
 * Data Access Object for Category
 */
class CategoryDao implements CategoryDaoInterface
{
    /**
     * Get Category lists
     *
     * @return \Illuminate\Support\Collection $categories
     */
    public function getCategories()
    {
        return Category::query();
    }

    /**
     * Save Category
     *
     * @param array $request
     * @return void
     */
    public function saveCategory($request)
    {
        Category::create($request);
    }

    /**
     * Delete Category
     *
     * @param int $id
     * @return void
     */
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }
}
