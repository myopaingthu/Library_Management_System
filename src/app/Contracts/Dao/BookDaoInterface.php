<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for Category
 */
interface BookDaoInterface
{
    /**
     * Get Book lists
     *
     * @return \Illuminate\Support\Collection $categories
     */
    public function getBooks();

    /**
     * Save Book
     *
     * @param array $request
     * @param int $id
     * @return void
     */
    public function saveBook($request, $id);

    /**
     * Get Book by id
     *
     * @param int $id
     * @return App\Models\Book $book
     */
    public function getBookById($id);
    
    /**
     * Delete Book
     *
     * @param int $id
     * @return void
     */
    public function deleteBookById($id);
}
