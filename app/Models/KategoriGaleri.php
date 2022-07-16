<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriGaleri extends Model
{
    protected $table = 'galeri_event';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = [
        "created_by",
        "updated_by",
    ];
}
