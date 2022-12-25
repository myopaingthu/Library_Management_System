<?php

namespace App\ViewModels;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Spatie\ViewModels\ViewModel;

class BookViewModel extends ViewModel
{
    public $book;

    public function __construct(Book $book = null)
    {
        $this->book = $book;
    }

    public function book()
    {
        return $this->book ?? new Book();
    }

    public function categories()
    {
        return Category::all();
    }

    public function authors()
    {
        return Author::all();
    }

    public function publishers()
    {
        return Publisher::all();
    }
}
