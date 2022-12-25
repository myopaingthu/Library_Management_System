<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIssue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'book_id',
        'issue_date',
        'return_date',
        'issue_status',
        'return_day',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'issue_date' => 'datetime',
        'return_date' => 'datetime',
        'return_day' => 'datetime',
    ];

    /**
     * Get the user that owns the bookissue.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the book that owns the bookissue.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
