<?php

namespace App\Contracts\Services;

/**
 * Interface for Author service.
 */
interface AuthorServiceInterface
{
    /**
     * Get Authors lists
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
