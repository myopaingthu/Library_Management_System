<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];

    /**
     * Get the books associated with the publisher.
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

        static::deleting(function ($publisher) {
            foreach ($publisher->books as $book) {
                $book->delete();
            }
        });
    }
}
