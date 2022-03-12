<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
