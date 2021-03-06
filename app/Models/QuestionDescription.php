<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionDescription extends Model
{
    use HasFactory, SoftDeletes;

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function samprotik_question()
    {
        return $this->belongsTo(SamprotikQuestion::class, 'samprotik_ques_id', 'id');
    }

    public function edited_descriptions()
    {
        return $this->morphMany(EditedDescription::class, 'descriptionable');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_user_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_user_id', 'id');
    }

    /**
     * Get all of the descriptions's votes.
     */
    public function votes()
    {
        return $this->morphMany(Vote::class, 'votable');
    }
}
