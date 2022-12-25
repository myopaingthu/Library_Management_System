<?php

namespace App\Contracts\Services;

/**
 * Interface for IssueBook service.
 */
interface IssueBookServiceInterface
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
     * Send mail to users who not returned IssueBooks that exceed return date
     *
     * @return void
     */
    public function sendMailToUsers();
}
