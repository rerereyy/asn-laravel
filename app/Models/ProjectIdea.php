<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectIdea extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'status',
    ];
}
