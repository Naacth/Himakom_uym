<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $fillable = [
        'email', 'phone', 'address', 'instagram', 'facebook', 'linkedin', 'youtube', 'tiktok'
    ];
}
