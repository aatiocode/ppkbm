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
            'artikel.nama as nama_user',
            'artikel_kategori.nama'
        ];

        return self::leftJoin('artikel_kategori', 'artikel.id_kategori', '=', 'artikel_kategori.id')
        ->select($select)
        ->orderBy('id', 'asc')
        ->where(function ($query) use ($search) {
          $query->where('artikel_kategori.nama', 'like', '%'.trim(strtolower($search)).'%');
      })
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

    public static function getArtikelBeranda($condition = null)
    {
        $select = [
            'artikel.*',
            'artikel.nama as nama_user',
            'artikel_kategori.nama as nama_kategori'
        ];

        return self::leftJoin('artikel_kategori', 'artikel.id_kategori', '=', 'artikel_kategori.id')
        ->select($select)
        ->where([
          ['artikel_kategori.nama', $condition],
          ['artikel.status', 1]
        ])
        ->orderBy('id', 'asc')
        ->get();
    }
}
