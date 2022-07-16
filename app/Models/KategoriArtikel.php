<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    protected $table = 'artikel_kategori';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = [
        "created_by",
        "updated_by",
    ];
}
