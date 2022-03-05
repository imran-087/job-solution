<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditedCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category', 'editor_id', 'status'
    ];

    public function categoriable()
    {
        return $this->morphTo();
    }
}
