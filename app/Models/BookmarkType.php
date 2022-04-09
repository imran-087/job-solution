<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkType extends Model
{
    use HasFactory;

    protected $fillable = ['type_name', 'created_user_id'];
}
