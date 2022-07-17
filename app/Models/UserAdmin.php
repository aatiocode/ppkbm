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

    public static function getIndexAttribute($search = null)
    {
        $select = [
            'admin.*',
            'user_group_previledge.user_admin_id',
            'user_group_previledge.user_group_id',
            'user_group.group_title'
        ];

        return self::leftJoin('user_group_previledge', 'admin.id', '=', 'user_group_previledge.user_admin_id')
        ->leftJoin('user_group', 'user_group_previledge.user_group_id', '=', 'user_group.id')
        ->select($select)
        ->orderBy('id', 'asc')
        ->where(function ($query) use ($search) {
            $query->where('nip', 'ilike', '%'.trim(strtolower($search)).'%');
        })
        ->orWhere(function ($query) use ($search) {
            $query->where('nama_lengkap', 'ilike', '%'.trim(strtolower($search)).'%');
        })
        ->paginate(10);
    }

    public static function getUserNameAttribute($user, $isLanding = false)
    {
        return self::where('nip', $user)
        ->orWhere('email', $user)
        ->first();
    }

    public static function getMenuValue($id)
    {
        $menu = UserAdmin::leftJoin('user_group_previledge', 'admin.id', '=', 'user_group_previledge.user_admin_id')
        ->leftJoin('group_menu_previledge', 'group_menu_previledge.user_group_id', '=', 'user_group_previledge.user_group_id')
        ->leftJoin('menu', 'group_menu_previledge.menu_id', '=', 'menu.id')
        ->select('menu.path_title')
        ->where([
            ['admin.id', $id],
            ['menu.landing', false],
            ['menu.active', true],
            ['menu.deleted_by', null]
        ])
        ->get()->pluck('path_title');
        return $menu;
    }
}
