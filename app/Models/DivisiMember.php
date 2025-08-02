<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DivisiMember extends Model
{
    protected $fillable = [
        'divisi_id', 'name', 'position', 'photo', 'batch'
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
