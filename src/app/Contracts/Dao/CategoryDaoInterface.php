<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for Category
 */
interface CategoryDaoInterface
{
    /**
     * Get Category lists
     *
     * @return \Illuminate\Support\Collection $categories
     */
    public function getCategories();

    /**
     * Save Category
     *
     * @param array $request
     * @return void
     */
    public function saveCategory($request);
    
    /**
     * Delete Category
     *
     * @param int $id
     * @return void
     */
    public function deleteCategory($id);
}
