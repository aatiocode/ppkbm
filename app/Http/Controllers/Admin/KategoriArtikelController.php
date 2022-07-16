<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;
use App\Helpers\AmcHelper as Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lang;
use Validator;

class KategoriArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = KategoriArtikel::orderBy('id', 'asc')->paginate(10);
        $index = $artikel->firstItem();
        return view('kategoriArtikel.index', compact('artikel', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoriArtikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategoriArtikel = new KategoriArtikel();
        $rules = [
            'nama' => 'required',
            'status' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/admin/kategori-artikel/add')->with('message', Helper::displayString(Lang::get('static.empty_field'), Lang::get('static.failed')));
        }

        $kategoriArtikel->nama = $request->nama;
        $kategoriArtikel->status = $request->status;
        $kategoriArtikel->created_by = Session::get('nip');
        $kategoriArtikel->updated_by = Session::get('nip');

        echo $kategoriArtikel;
        $kategoriArtikel->save();

        $artikel = KategoriArtikel::latest()->first();
        return redirect('/admin/kategori-artikel')->with('message', Helper::displayString(Lang::get('static.success_message'), Lang::get('static.success')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriArtikel  $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $kategoriArtikel)
    {
        $id = base64_decode($kategoriArtikel);
        $kategoriArtikel = KategoriArtikel::find($id);
        $kategoriArtikel->view_only = (boolean) $request->query('view') ?? (boolean) 'false';
        return view('kategoriArtikel.edit', compact('kategoriArtikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriArtikel  $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kategoriArtikel)
    {
        $id = base64_decode($kategoriArtikel);
        $artikel = KategoriArtikel::find($id);
        $rules = [
            'nama' => 'required',
            'status' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/admin/kategori-artikel')->with('message', Helper::displayString(Lang::get('static.empty_field'), Lang::get('static.failed')));
        }

        $artikel->nama = $request->nama;
        $artikel->status = $request->status;
        $artikel->created_by = Session::get('nip');
        $artikel->updated_by = Session::get('nip');
        $artikel->save();

        $artikel = KategoriArtikel::latest('updated_at')->first();
        return redirect('/admin/kategori-artikel')->with('message', Helper::displayString(Lang::get('static.success_message'), Lang::get('static.success')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriArtikel  $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriArtikel $kategoriArtikel)
    {
        $kategoriArtikel::destroy($kategoriArtikel->id);
        return response()->json(Helper::returnResponse(Lang::get('static.delete_success_message'), Lang::get('static.success_code'), Lang::get('static.success')), Lang::get('static.success_code'));
    }
}
