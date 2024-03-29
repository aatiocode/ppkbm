<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = ['judul', 'id_event', 'foto', 'video', 'status'];
    protected $table = 'galeri';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = [
        "created_by",
        "updated_by",
    ];

    public static function getIndexAttribute($search = null)
    {
        $select = [
            'galeri.*',
            'galeri_event.nama'
        ];

        return self::leftJoin('galeri_event', 'galeri.id_event', '=', 'galeri_event.id')
        ->select($select)
        ->orderBy('id', 'asc')
        ->where(function ($query) use ($search) {
          $query->where('galeri_event.nama', 'like', '%'.trim(strtolower($search)).'%');
      })
        ->paginate(10);
    }

    public static function getGaleriLanding()
    {
        $select = [
            'galeri.*',
            'galeri_event.nama as nama_event'
        ];

        return self::leftJoin('galeri_event', 'galeri.id_event', '=', 'galeri_event.id')
        ->select($select)
        ->orderBy('id', 'desc')
        ->get();
    }

    public static function getGaleriLogo()
    {
        $select = [
            'galeri.*',
            'galeri_event.nama as nama_event'
        ];

        return self::leftJoin('galeri_event', 'galeri.id_event', '=', 'galeri_event.id')
        ->select($select)
        ->where('galeri_event.nama', config('constants.header_logo'))
        ->orderBy('id', 'desc')
        ->first();
    }

    public static function getGaleriBeranda()
    {
        $select = [
            'galeri.*',
            'galeri_event.nama as nama_event'
        ];

        return self::leftJoin('galeri_event', 'galeri.id_event', '=', 'galeri_event.id')
        ->select($select)
        ->where([
          ['galeri_event.nama', config('constants.carousel_halaman_utama')],
          ['galeri.status', 1]
        ])
        ->orderBy('id', 'desc')
        ->get();
    }
}
