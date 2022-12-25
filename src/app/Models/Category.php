<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];

    /**
     * Get the books associated with the category.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    /**  
     * Ondelete cascade for category
     */
    public static function boot() {
        parent::boot();

        static::deleting(function($category) {
            foreach($category->books as $book) {
                $book->delete();
            }
        });
    }
}
