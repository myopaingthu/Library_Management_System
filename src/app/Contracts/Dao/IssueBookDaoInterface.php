<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for Issue Book
 */
interface IssueBookDaoInterface
{
    /**
     * Get Issue Book lists
     *
     * @return \Illuminate\Support\Collection $categories
     */
    public function getIssueBooks();

    /**
     * Save Issue Book
     *
     * @param array $request
     * @return void
     */
    public function saveIssueBook($request);

    /**
     * get book and fine
     *
     * @param int $id
     * @return array
     */
    public function getBookAndFine($id);

    /**
     * Mark book as returned
     *
     * @param int $id
     * @return void
     */
    public function markBookAsReturned($id);

    /**
     * get users who not returned IssueBooks that exceed return date
     *
     * @return \Illuminate\Support\Collection $categories
     */
    public function getUsersToNotify();
}
