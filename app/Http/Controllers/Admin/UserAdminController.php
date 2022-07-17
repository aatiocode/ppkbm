<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAdmin;
use Illuminate\Http\Request;
use App\Helpers\AmcHelper as Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lang;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $search =  $request->input('q');
        $userAdmin = UserAdmin::getIndexAttribute();

        if ($search != "") {
            $userAdmin = UserAdmin::getIndexAttribute($search);
            $userAdmin->appends(['q' => $search]);
        }

        $userCount = UserAdmin::getIndexAttribute();
        $index = $userAdmin->firstItem();

        return View('userAdmin.index', compact('userAdmin', 'index', 'search', 'userCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userAdmin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $lastID = UserAdmin::latest('id')->first();
            $email = trim($request->email);
            $userAdmin = new UserAdmin();
            $this->validate($request, [
                'nip' => 'required',
                'nama_lengkap' => 'required',
                'email' => 'required',
                'password' => 'required',
                'status' => 'required'
            ]);

            $userAdmin->id = $lastID->id + 1;
            $userAdmin->nip = $request->nip;
            $userAdmin->nama_lengkap = $request->nama_lengkap;
            $userAdmin->password = bcrypt($request->password);
            $userAdmin->status = $request->status;
            $userAdmin->email = $email;
            $userAdmin->created_by = Session::get('nip');
            $userAdmin->updated_by = Session::get('nip');
            $userAdmin->save();

            return redirect('/admin/user-admin')->with('message', Helper::displayString(Lang::get('static.success_message'), Lang::get('static.success')));
        } catch (\Exception $e) {
            return redirect('/admin/user-admin')->with('message', Helper::displayString($e->getMessage(), Lang::get('static.failed')));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserAdmin  $userAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $userAdmin)
    {
        $id = base64_decode($userAdmin);
        $userAdmin = UserAdmin::find($id);
        $userAdmin->view_only = (boolean) $request->query('view') ?? (boolean) 'false';

        return view('userAdmin.edit', compact('userAdmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserAdmin  $userAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userAdmin)
    {
        try {
            $email = trim($request->email);
            $id = base64_decode($userAdmin);
            $userAdmin = UserAdmin::find($id);
            $this->validate($request, [
              'nip' => 'required',
              'nama_lengkap' => 'required',
              'email' => 'required',
              'status' => 'required'
          ]);

            $userAdmin->nip = $request->nip;
            $userAdmin->nama_lengkap = $request->nama_lengkap;
            $userAdmin->status = $request->status;
            $userAdmin->email = $email;
            $userAdmin->created_by = Session::get('nip');
            $userAdmin->updated_by = Session::get('nip');
            $userAdmin->updated_at = now();
            $userAdmin->save();

            return redirect('/admin/user-admin')->with('message', Helper::displayString(Lang::get('static.success_message'), Lang::get('static.success')));
        } catch (\Exception $e) {
            return redirect('/admin/user-admin')->with('message', Helper::displayString($e->getMessage(), Lang::get('static.failed')));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserAdmin  $userAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAdmin $userAdmin)
    {
        $userAdmin::destroy($userAdmin->id);
        return response()->json(Helper::returnResponse(Lang::get('static.delete_success_message'), Lang::get('static.success_code'), Lang::get('static.success')), Lang::get('static.success_code'));
    }
}
