<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory, SoftDeletes;


    protected $guarded = [];

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function question_option()
    {
        return $this->hasOne(QuestionOption::class);
    }

    public function descriptions()
    {
        return $this->hasMany(QuestionDescription::class);
    }

    public function passage()
    {
        return $this->belongsTo(Passage::class);
    }

    //pivot relation
    public function tagsubject()
    {
        return  $this->hasMany(Subject::class, 'question_subjects', 'subject_id', 'question_id');
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
}
