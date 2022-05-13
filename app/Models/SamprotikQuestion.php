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

    public function descriptions()
    {
        return $this->hasMany(QuestionDescription::class, 'samprotik_ques_id', 'id');
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

    public function samprotikBookmarks()
    {
        return $this->hasMany(SamprotikBookmarks::class);
    }
}
