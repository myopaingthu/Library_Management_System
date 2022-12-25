<?php

namespace App\Dao;

use App\Contracts\Dao\AuthorDaoInterface;
use App\Models\Author;

/**
 * Data Access Object for Author
 */
class AuthorDao implements AuthorDaoInterface
{
    /**
     * Get Author lists
     *
     * @return \Illuminate\Support\Collection $authors
     */
    public function getAuthors()
    {
        return Author::query();
    }

    /**
     * Save Author
     *
     * @param array $request
     * @return void
     */
    public function saveAuthor($request)
    {
        Author::create($request);
    }

    /**
     * Delete Author
     *
     * @param int $id
     * @return void
     */
    public function deleteAuthor($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
    }
}
