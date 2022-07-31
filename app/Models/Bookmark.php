<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the models that own bookmark.
    */
    public function bookmarkable()
    {
        return $this->morphTo();
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
