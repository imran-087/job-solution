<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditedDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'editor_id', 'status'
    ];

    public function descriptionable()
    {
        return $this->morphTo();
    }
}
