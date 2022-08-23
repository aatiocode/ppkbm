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
        ->whereNotIn('artikel_kategori.nama', [
            config('constants.header_logo'),
            config('constants.carousel_halaman_utama'),
            config('constants.tentang_kami'),
            config('constants.paket_pendidikan'),
            config('constants.testimoni'),
            config('constants.identitas'),
            config('constants.visi_misi'),
            config('constants.program_belajar'),
            config('constants.lokasi_sekolah'),
            config('constants.pengajar_dan_staff'),
            config('constants.paket_pendidikan'),
            config('constants.paket_pendidikan')
        ])
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
