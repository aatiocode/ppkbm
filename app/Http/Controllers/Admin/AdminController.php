<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\UserAdmin;
use Illuminate\Support\Facades\Hash;
use App\Helpers\AmcHelper as Helper;
use Lang;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cms(Request $request)
    {
        $is_login = $request->session()->get('is_login');
        if ($is_login) {
            return view('cms');
        }
        return redirect('/user/login');
    }

    public function edit(Request $request)
    {
        return view('user.edit');
    }

    public function update(Request $request)
    {
        $user = UserAdmin::getUserNameAttribute($request->username);
        if (Hash::check($request->oldPassword, $user->password, [])) {
            $user->password = bcrypt($request->newPassword);
            $user->save();
            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), Lang::get('static.success_change_password')), Lang::get('static.success_code'));
        }
        return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), Lang::get('static.wrong_old_password')), Lang::get('static.bad_request'));
    }
}
