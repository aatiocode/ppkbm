<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class UserAdmin extends Model
{
    protected $table = 'admin';
    protected $fillable = ['nip', 'password'];
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = [
        "created_by",
        "updated_by",
        'password',
    ];

    protected $dates = ['deleted_at'];

    public static function getUserNameAttribute($user, $isLanding = false)
    {
        return self::where('nip', $user)
        ->orWhere('email', $user)
        ->first();
    }
}
