<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];

    /**
     * Get the books associated with the author.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    /**  
     * Ondelete cascade for user
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($author) {
            foreach ($author->books as $book) {
                $book->delete();
            }
        });
    }
}
