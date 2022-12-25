<?php

namespace App\Dao;

use App\Contracts\Dao\AdminDaoInterface;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookIssue;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\User;

/**
 * Data Access Object for Admin
 */
class AdminDao implements AdminDaoInterface
{
    /**
     * Get Admin Data lists
     *
     * @return array $count
     */
    public function getAdminDataTotalCount()
    {
        $counts['Users'] = User::all()->count();
        $counts['Categories'] = Category::all()->count();
        $counts['Authors'] = Author::all()->count();
        $counts['Publishers'] = Publisher::all()->count();
        $counts['Books'] = Book::all()->count();
        $counts['BookIssues'] = BookIssue::all()->count();
        return $counts;
    }
}
