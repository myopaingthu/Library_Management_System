<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for Author
 */
interface AuthorDaoInterface
{
    /**
     * Get Author lists
     *
     * @return \Illuminate\Support\Collection $authors
     */
    public function getAuthors();

    /**
     * Save Author
     *
     * @param array $request
     * @return void
     */
    public function saveAuthor($request);

    /**
     * Delete Author
     *
     * @param int $id
     * @return void
     */
    public function deleteAuthor($id);
}
