<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionInstruction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(WrittenQuestion::class);
    }
}
