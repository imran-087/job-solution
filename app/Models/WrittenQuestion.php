<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class WrittenQuestion extends Model
{
    use HasFactory, SoftDeletes, NodeTrait;

    protected $guarded = [];

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function answer()
    {
        return $this->hasOne(WrittenAnswer::class);
    }

    ####* Polymorphic Relation Start *####
    /**
     * Get all of the question's descriptions.
     */
    public function descriptions()
    {
        return $this->morphMany(Description::class, 'descriptionable');
    }
}
