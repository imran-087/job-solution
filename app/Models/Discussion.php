<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discussion extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    // <!--find::Best reply-->
    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * Get all of the discussions's vote.
     */
    public function votes()
    {
        return $this->morphMany(Vote::class, 'votable');
    }


    //generate unique slug
    protected static function boot()
    {
        parent::boot();
        static::created(function ($discussion) {
            $discussion->slug = $discussion->generateSlug($discussion->title);
            $discussion->save();
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
