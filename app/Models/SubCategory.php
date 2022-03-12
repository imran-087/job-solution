<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    //subject
    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
