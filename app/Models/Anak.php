<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orangTua () {
        return $this->belongsTo(OrangTua::class, 'id_orangTua');
    }
}
