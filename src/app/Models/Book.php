<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'category_id',
        'author_id',
        'publisher_id',
    ];

    /**
     * Get the category that owns the book.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the author that owns the book.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the publisher that owns the book.
     */
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * Get the book issued associated with the book.
     */
    public function bookIssues()
    {
        return $this->hasMany(BookIssue::class);
    }

    /**  
     * Ondelete cascade for book
     */
    public static function boot() {
        parent::boot();

        static::deleting(function($book) {
            foreach($book->bookIssues as $bookIssue) {
                $bookIssue->delete();
            }
        });
    }
}
