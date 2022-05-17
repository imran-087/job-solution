<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class WrittenQuestionTest extends Model
{
    use HasFactory, NodeTrait;

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function answer()
    {
        return $this->hasOne(WrittenAnswer::class);
    }
}
