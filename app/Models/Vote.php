<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the parent votable model (question or discussion)
     */
    public function votable()
    {
        return $this->morphTo();
    }
}
