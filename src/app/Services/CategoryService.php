<?php

namespace App\Services;

use App\Contracts\Dao\CategoryDaoInterface;
use App\Contracts\Services\CategoryServiceInterface;

/**
 * Service class for Category.
 */
class CategoryService implements CategoryServiceInterface
{
    /**
     * Category Dao
     */
    private $categoryDao;

    /**
     * Class Constructor
     *
     * @param CategoryDaoInterface $categoryDao
     * @return void
     */
    public function __construct(CategoryDaoInterface $categoryDao)
    {
        $this->categoryDao = $categoryDao;
    }

    /**
     * Get Category lists
     *
     * @return \Illuminate\Support\Collection $categories
     */
    public function getCategories()
    {
        return $this->categoryDao->getCategories();
    }

    /**
     * Save Category
     *
     * @param array $request
     * @return void
     */
    public function saveCategory($request)
    {
        $this->categoryDao->saveCategory($request);
    }

    /**
     * Delete Category
     *
     * @param int $id
     * @return void
     */
    public function deleteCategory($id)
    {
        $this->categoryDao->deleteCategory($id);
    }
}
