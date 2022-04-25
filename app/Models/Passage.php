<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Passage extends Model
{
    use HasFactory;

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    //generate unique slug
    protected static function boot()
    {
        parent::boot();
        static::created(function ($passage) {
            $passage->slug = $passage->generateSlug($passage->name);
            $passage->save();
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
