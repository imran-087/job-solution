<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SamprotikQuestion extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'options' => 'json'
    ];

    public function samprotikBookmarks()
    {
        return $this->hasMany(SamprotikBookmarks::class);
    }

    public function created_by()
    {
        return $this->belongsTo(Admin::class, 'created_user_id');
    }

    public function updated_by()
    {
        return $this->belongsTo(Admin::class, 'updated_user_id');
    }

    ####* Polymorphic Relation Start *####

    /**
     * Get all of the question's descriptions.
     */
    public function descriptions()
    {
        return $this->morphMany(Description::class, 'descriptionable');
    }

    /**
     * Get all of the question's votes.
     */
    public function votes()
    {
        return $this->morphMany(Vote::class, 'votable');
    }

    /**
     * Get all of the question's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get all of the tags(here tag = subjects) for the samprotik.
     */
    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectable')->withPivot('created_user_id', 'deleted_at', 'status', )->withTimestamps();
    }

    
}
