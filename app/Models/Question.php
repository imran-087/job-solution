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

    //generate unique slug
    protected static function boot()
    {
        parent::boot();
        static::created(function ($question) {
            $question->slug = $question->generateSlug($question->name);
            $question->save();
        });
    }

    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
