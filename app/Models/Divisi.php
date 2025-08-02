<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $fillable = [
        'name', 'description', 'photo', 'logo', 'group_photo'
    ];

    public function members()
    {
        return $this->hasMany(DivisiMember::class);
    }
}
