<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    //ploymorphic relation
    public function edited_categories()
    {
        return $this->morphMany(EditedCategory::class, 'categoriable');
    }

    public function edited_descriptions()
    {
        return $this->morphMany(EditedDescription::class, 'descriptionable');
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function main_category()
    {
        return $this->belongsTo(MainCategory::class);
    }
}
