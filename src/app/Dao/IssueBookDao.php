<?php

namespace App\Dao;

use DB;
use Illuminate\Database\Eloquent\Builder;
use App\Contracts\Dao\IssueBookDaoInterface;
use App\Enums\BookStatus;
use App\Enums\IssueStatus;
use App\Models\BookIssue;
use App\Models\Setting;
use App\Models\Book;
use App\Models\User;

/**
 * Data Access Object for Category
 */
class IssueBookDao implements IssueBookDaoInterface
{
    /**
     * Get Issue Book lists
     *
     * @return \Illuminate\Support\Collection $categories
     */
    public function getIssueBooks()
    {
        return BookIssue::with(['user', 'book'])
            ->get();
    }

    /**
     * Save Issue Book
     *
     * @param array $request
     * @return void
     */
    public function saveIssueBook($request)
    {
        $issue_date = date('Y-m-d');
        $return_date = date('Y-m-d', strtotime("+" . (Setting::latest()->first()->return_days) . " days"));
        try {
            DB::beginTransaction();

            $book_issue = new BookIssue();
            $book_issue->user_id = $request['user_id'];
            $book_issue->book_id = $request['book_id'];
            $book_issue->issue_date = $issue_date;
            $book_issue->return_date = $return_date;
            $book_issue->save();

            $book = Book::findOrFail($request['book_id']);
            $book->status = BookStatus::Issued;
            $book->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * get book and fine
     *
     * @param int $id
     * @return array
     */
    public function getBookAndFine($id)
    {
        $book_issue = BookIssue::findOrFail($id);
        $first_date = date_create(date('Y-m-d'));
        $last_date = date_create($book_issue->return_date);
        if ($first_date <= $last_date) {
            $fine = 0;
        } else {
            $diff = date_diff($first_date, $last_date);
            $fine = (Setting::latest()->first()->fine * $diff->format('%a'));
        }

        return [
            'book_issue' => $book_issue,
            'fine' => $fine,
        ];
    }

    /**
     * Mark book as returned
     *
     * @param int $id
     * @return void
     */
    public function markBookAsReturned($id)
    {
        try {
            DB::beginTransaction();

            $book_issue = BookIssue::findOrFail($id);
            $book_issue->issue_status = IssueStatus::Returned;
            $book_issue->return_day = date('Y-m-d');
            $book_issue->save();

            $book = $book_issue->book;
            $book->status = BookStatus::Available;
            $book->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    /**
     * get users who not returned IssueBooks that exceed return date
     *
     * @return \Illuminate\Support\Collection $categories
     */
    public function getUsersToNotify()
    {
        return User::whereHas('bookIssues', function (Builder $query) {
            $query->where('issue_status', IssueStatus::Issued)
                ->whereDate('return_date', '<=', now());
        })
        ->with('bookIssues.book')
        ->get();
    }
}
