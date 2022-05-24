<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Description extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get all of the models that own descriptions.
     */
    public function descriptionable()
    {
        return $this->morphTo();
    }
}
