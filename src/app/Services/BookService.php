<?php

namespace App\Services;

use App\Contracts\Dao\BookDaoInterface;
use App\Contracts\Services\BookServiceInterface;

/**
 * Service class for Admin.
 */
class BookService implements BookServiceInterface
{
    /**
     * Book Dao
     */
    private $bookDao;

    /**
     * Class Constructor
     *
     * @param BookDaoInterface $bookDao
     * @return void
     */
    public function __construct(BookDaoInterface $bookDao)
    {
        $this->bookDao = $bookDao;
    }

    /**
     * Get Book lists
     *
     * @return \Illuminate\Support\Collection $categories
     */
    public function getBooks()
    {
        return $this->bookDao->getBooks();
    }

    /**
     * Save Book
     *
     * @param array $request
     * @param int $id
     * @return void
     */
    public function saveBook($request, $id = null)
    {
        $this->bookDao->saveBook($request, $id);
    }

    /**
     * Get Book by id
     *
     * @param int $id
     * @return App\Models\Book $book
     */
    public function getBookById($id)
    {
        return $this->bookDao->getBookById($id);
    }

    /**
     * Delete book
     *
     * @param int $id
     * @return void
     */
    public function deleteBookById($id)
    {
        $this->bookDao->deleteBookById($id);
    }
}
