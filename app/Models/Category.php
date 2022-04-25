<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    //ploymorphic relation
    public function edited_categories()
    {
        return $this->morphMany(EditedCategory::class, 'categoriable');
    }

    //Main Category
    public function main_category()
    {
        return $this->belongsTo(MainCategory::class);
    }

    //sub category
    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class);
    }

    //generate unique slug
    protected static function boot()
    {
        parent::boot();
        static::created(function ($category) {
            $category->slug = $category->generateSlug($category->name);
            $category->save();
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
