<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriGaleri;
use Illuminate\Http\Request;
use App\Helpers\AmcHelper as Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lang;
use Validator;

class KategoriGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = KategoriGaleri::orderBy('id', 'asc')->paginate(10);
        $index = $galleries->firstItem();
        return view('kategoriGaleri.index', compact('galleries', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoriGaleri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategoriGaleri = new KategoriGaleri();
        $rules = [
            'nama' => 'required',
            'status' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/admin/kategori-galeri/add')->with('message', Helper::displayString(Lang::get('static.empty_field'), Lang::get('static.failed')));
        }

        $kategoriGaleri->nama = $request->nama;
        $kategoriGaleri->status = $request->status;
        $kategoriGaleri->created_by = Session::get('nip');
        $kategoriGaleri->updated_by = Session::get('nip');
        $kategoriGaleri->save();

        $galleries = KategoriGaleri::latest()->first();
        return redirect('/admin/kategori-galeri')->with('message', Helper::displayString(Lang::get('static.success_message'), Lang::get('static.success')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriGaleri  $kategoriGaleri
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $kategoriGaleri)
    {
        $id = base64_decode($kategoriGaleri);
        $kategoriGaleri = KategoriGaleri::find($id);
        $kategoriGaleri->view_only = (boolean) $request->query('view') ?? (boolean) 'false';
        return view('kategoriGaleri.edit', compact('kategoriGaleri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriGaleri  $kategoriGaleri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kategoriGaleri)
    {
        $id = base64_decode($kategoriGaleri);
        $galleries = KategoriGaleri::find($id);
        $rules = [
            'nama' => 'required',
            'status' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/admin/kategori-galeri')->with('message', Helper::displayString(Lang::get('static.empty_field'), Lang::get('static.failed')));
        }

        $galleries->nama = $request->nama;
        $galleries->status = $request->status;
        $galleries->created_by = Session::get('nip');
        $galleries->updated_by = Session::get('nip');
        $galleries->save();

        $galleries = KategoriGaleri::latest('updated_at')->first();
        return redirect('/admin/kategori-galeri')->with('message', Helper::displayString(Lang::get('static.success_message'), Lang::get('static.success')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriGaleri  $kategoriGaleri
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriGaleri $kategoriGaleri)
    {
        $kategoriGaleri::destroy($kategoriGaleri->id);
        return response()->json(Helper::returnResponse(Lang::get('static.delete_success_message'), Lang::get('static.success_code'), Lang::get('static.success')), Lang::get('static.success_code'));
    }
}
