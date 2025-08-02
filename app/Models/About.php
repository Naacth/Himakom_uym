<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'values', 'history', 'milestones'
    ];

    protected $casts = [
        'values' => 'array',
        'milestones' => 'array',
    ];
}
