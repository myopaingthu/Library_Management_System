<?php

namespace App\Contracts\Services;

/**
 * Interface for Category service.
 */
interface BookServiceInterface
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
    public function saveBook($request, $id = null);

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