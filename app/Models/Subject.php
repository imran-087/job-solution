<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Subject extends Model
{
    use HasFactory, NodeTrait;

    protected $guarded = [];

    //ploymorphic relation
    public function edited_categories()
    {
        return $this->morphMany(EditedCategory::class, 'categoriable');
    }

    public function edited_descriptions()
    {
        return $this->morphMany(EditedDescription::class, 'descriptionable');
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function main_category()
    {
        return $this->belongsTo(MainCategory::class);
    }

    public function parentsub()
    {
        return $this->belongsTo(Subject::class, 'parent_id');
    }

    //pivot relation
    public function pivotquestion()
    {
        return  $this->hasMany(Question::class);
    }

    ######### Polymorphic Relation ###########

    /**
     * Get all of the samprotik_questions that includes this subject.
     */
    public function samprotiks()
    {
        return $this->morphedByMany(SamprotikQuestion::class, 'subjectable');
    }

    /**
     * Get all of the written_questions that includes this subject.
     */
    public function writtens()
    {
        return $this->morphedByMany(WrittenQuestion::class, 'subjectable');
    }

    /**
     * Get all of the mcq_questions that includes this subject.
     */
    public function questions()
    {
        return $this->morphedByMany(Question::class, 'subjectable');
    }

    //local scope
    public function scopeSubject($query, $subcategory, $parent)
    {
        $query->where(['sub_category_id' => $subcategory, 'parent_id' => $parent]);
    }
}
