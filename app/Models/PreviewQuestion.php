<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviewQuestion extends Model
{
    use HasFactory;

    protected $casts = [
        'image_option' => 'json'
    ];

    public function passage()
    {
        return $this->belongsTo(Passage::class);
    }
}
