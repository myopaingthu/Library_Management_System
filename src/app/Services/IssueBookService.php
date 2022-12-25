<?php

namespace App\Services;

use Mail;
use App\Contracts\Dao\IssueBookDaoInterface;
use App\Contracts\Services\IssueBookServiceInterface;
use App\Mail\RemindUserMail;

/**
 * Service class for Admin.
 */
class IssueBookService implements IssueBookServiceInterface
{
    /**
     * IssueBook Dao
     */
    private $issueBookDao;

    /**
     * Class Constructor
     *
     * @param IssueBookDaoInterface $issueBookDao
     * @return void
     */
    public function __construct(IssueBookDaoInterface $issueBookDao)
    {
        $this->issueBookDao = $issueBookDao;
    }

    /**
     * Get Issue Book lists
     *
     * @return \Illuminate\Support\Collection $categories
     */
    public function getIssueBooks()
    {
        return $this->issueBookDao->getIssueBooks();
    }

    /**
     * Save Issue Book
     *
     * @param array $request
     * @return void
     */
    public function saveIssueBook($request)
    {
        $this->issueBookDao->saveIssueBook($request);
    }

    /**
     * get book and fine
     *
     * @param int $id
     * @return array
     */
    public function getBookAndFine($id)
    {
        return $this->issueBookDao->getBookAndFine($id);
    }

    /**
     * Mark book as returned
     *
     * @param int $id
     * @return void
     */
    public function markBookAsReturned($id)
    {
        $this->issueBookDao->markBookAsReturned($id);
    }

    /**
     * Send mail to users who not returned IssueBooks that exceed return date
     *
     * @return void
     */
    public function sendMailToUsers()
    {
        $users = $this->issueBookDao->getUsersToNotify();
        foreach ($users as $user) {
            Mail::to($user)->send(new RemindUserMail());
        }
    }
}
