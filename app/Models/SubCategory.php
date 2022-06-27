<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;

    //ploymorphic relation
    public function edited_categories()
    {
        return $this->morphMany(EditedCategory::class, 'categoriable');
    }

    //category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //year
    public function year()
    {
        return $this->belongsTo(Year::class);
    }

    //subject
    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

    //question
    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function subject_questions()
    {
        return $this->hasManyThrough(Question::class, Subject::class);
    }

    //written_question
    public function written_questions()
    {
        return $this->hasMany(WrittenQuestion::class);
    }

    //generate unique slug
    protected static function boot()
    {
        parent::boot();
        static::created(function ($sub_category) {
            $sub_category->slug = $sub_category->generateSlug($sub_category->name);
            $sub_category->save();
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
