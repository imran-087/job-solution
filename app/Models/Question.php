<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function main_category()
    {
        return $this->belongsTo(MainCategory::class);
    }

    public function subCategory()
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

    public function passage()
    {
        return $this->belongsTo(Passage::class);
    }

    //pivot relation
    public function pivotsubject()
    {
        return  $this->belongsToMany(Subject::class);
    }

    ####* Polymorphic Relation Start *####

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
     * Get all of the question's descriptions.
     */
    public function descriptions()
    {
        return $this->morphMany(Description::class, 'descriptionable');
    }

    /**
     * Get all of the tags(here tag = subjects) for the question.
     */
    public function subjects()
    {
        return $this->morphToMany(Subject::class, 'subjectable')->withPivot('created_user_id', 'deleted_at', 'status')->withTimestamps();;
    }


    //local scope start
    public function scopeQuestion($query, $subcategory, $type)
    {
        $query->with('question_option')->where(['sub_category_id' => $subcategory, 'question_type' => $type]);
    }

    //json relation witjh exam details
    public function exam_details()
    {
        return $this->hasManyJson(ExamDetail::class, 'question_ids->question_id');
    }

    public function users()
    {
        return $this->hasManyJson(User::class, 'options->roles[]->role_id');
    }
}
