<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = [
        "created_by",
        "updated_by",
    ];

    public static function getIndexAttribute($search = null)
    {
        $select = [
            'artikel.*',
            'artikel_kategori.nama'
        ];

        return self::leftJoin('artikel_kategori', 'artikel.id_kategori', '=', 'artikel_kategori.id')
        ->select($select)
        ->orderBy('id', 'asc')
        ->paginate(10);
    }

    public static function getArtikelLanding()
    {
        $select = [
            'artikel.*',
            'artikel_kategori.nama as nama_kategori'
        ];

        return self::leftJoin('artikel_kategori', 'artikel.id_kategori', '=', 'artikel_kategori.id')
        ->select($select)
        ->orderBy('id', 'desc')
        ->get();
    }
}
