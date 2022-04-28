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
    public function pivotsubject()
    {
        return  $this->belongsToMany(Subject::class);
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

    //local scope
    public function scopeQuestion($query, $subcategory, $type)
    {
        $query->with('question_option')->where(['sub_category_id' => $subcategory, 'question_type' => $type]);
    }
}
