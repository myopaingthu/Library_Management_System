<?php

namespace App\Dao;

use App\Contracts\Dao\BookDaoInterface;
use App\Models\Book;
use App\Models\BookIssue;

/**
 * Data Access Object for Category
 */
class BookDao implements BookDaoInterface
{
    /**
     * Get Book lists
     *
     * @return \Illuminate\Support\Collection $books
     */
    public function getBooks()
    {
        return Book::with(['category', 'author', 'publisher'])
            ->get();
    }

    /**
     * Save Book
     *
     * @param array $request
     * @param int $id
     * @return void
     */
    public function saveBook($request, $id)
    {
        $book = $id ? Book::findOrFail($id) : new Book();
        $book->fill($request);
        $book->save();
    }

    /**
     * Get Book by id
     *
     * @param int $id
     * @return App\Models\Book $book
     */
    public function getBookById($id)
    {
        return Book::findOrFail($id);
    }

    /**
     * Delete Book
     *
     * @param int $id
     * @return void
     */
    public function deleteBookById($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
    }
}
