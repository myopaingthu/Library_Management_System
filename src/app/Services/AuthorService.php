<?php

namespace App\Services;

use App\Contracts\Dao\AuthorDaoInterface;
use App\Contracts\Services\AuthorServiceInterface;

/**
 * Service class for Author.
 */
class AuthorService implements AuthorServiceInterface
{
    /**
     * Author Dao
     */
    private $authorDao;

    /**
     * Class Constructor
     *
     * @param AuthorDaoInterface $authorDao
     * @return void
     */
    public function __construct(AuthorDaoInterface $authorDao)
    {
        $this->authorDao = $authorDao;
    }

    /**
     * Get Author lists
     *
     * @return \Illuminate\Support\Collection $authors
     */
    public function getAuthors()
    {
        return $this->authorDao->getAuthors();
    }

    /**
     * Save Author
     *
     * @param array $request
     * @return void
     */
    public function saveAuthor($request)
    {
        $this->authorDao->saveAuthor($request);
    }

    /**
     * Delete Author
     *
     * @param int $id
     * @return void
     */
    public function deleteAuthor($id)
    {
        $this->authorDao->deleteAuthor($id);
    }
}
