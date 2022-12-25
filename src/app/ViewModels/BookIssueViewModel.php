<?php

namespace App\ViewModels;

use App\Enums\BookStatus;
use App\Models\User;
use App\Models\Book;
use Spatie\ViewModels\ViewModel;

class BookIssueViewModel extends ViewModel
{
    public function users()
    {
        return User::all();
    }

    public function books()
    {
        return Book::where('status', BookStatus::Available)
            ->get();
    }
}
