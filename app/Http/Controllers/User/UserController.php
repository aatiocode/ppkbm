<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserAdmin;
use App\Helpers\AmcHelper as Helper;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Lang;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Mail\SendResetPassword;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request)
    {
        $is_login = $request->session()->get('is_login');

        if ($is_login) {
            return redirect('/admin');
        }

        return view('user.login');
    }

    public function storeLogin(Request $request)
    {
        $user = UserAdmin::getUserNameAttribute($request->username);

        if (!$user) {
            return redirect('/user/login')->with('message', Helper::displayString(Lang::get('static.failed_auth_no_access'), Lang::get('static.failed')));
        }

        if ($user && !$user->status) {
            return redirect('/user/login')->with('message', Helper::displayString(Lang::get('static.user_tidak_aktif'), Lang::get('static.failed')));
        }

        if ($user && Hash::check($request->password, $user->password, [])) {
            Session::put('id', $user->id);
            Session::put('nip', $user->nip);
            Session::put('name', $user->nama_lengkap);
            Session::put('is_login', true);

            return redirect('/admin')->with('message', Helper::displayString(Lang::get('static.login_success'), Lang::get('static.success')));
        }

        return redirect('/user/login')->with('message', Helper::displayString(Lang::get('static.wrong_username_password'), Lang::get('static.failed')));
    }

    public function logout()
    {
        Auth::logout();
        Session::forget([
      'id',
      'nip',
      'name',
      'is_login'
    ]);
        return redirect('/user/login')->with('message', Helper::displayString(Lang::get('static.logout_success'), Lang::get('static.success')));
    }

    public function update(Request $request)
    {
        $user = UserAdmin::getUserNameAttribute($request->username);
        if ($user) {
            $user->password = bcrypt($request->newPassword);
            $user->save();
            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), Lang::get('static.success_change_password')), Lang::get('static.success_code'));
        }
        return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), Lang::get('static.failed_auth_no_access')), Lang::get('static.bad_request'));
    }

    public function forgotPassword(Request $request)
    {
        $images = Background::latest()->first();
        if (Session::get('is_login')) {
            return redirect('/admin');
        }

        return view('user.forgotPassword', compact('images'));
    }

    public function resetPassword(Request $request)
    {
        $images = Background::latest()->first();
        if (Session::get('is_login')) {
            return redirect('/admin');
        }
        $token = $request->query('token');

        return view('user.resetPassword', compact('images', 'token'));
    }
}
