<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    /**
     * Get the books associated with the category.
     */
    public function bookIssues()
    {
        return $this->hasMany(BookIssue::class);
    }

    /**  
     * Ondelete cascade for user
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            foreach ($user->bookIssues as $bookIssue) {
                $bookIssue->delete();
            }
        });
    }
}
