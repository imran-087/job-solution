<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SamprotikBookmark extends Model
{
    use HasFactory;

    public function samprotik_ques()
    {
        return $this->belongsTo(SamprotikQuestion::class, 'question_id', 'id');
    }
}
