<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Helpers\AmcHelper as Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lang;
use Validator;

class PaketPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::getIndexAttribute(config('constants.paket_pendidikan'));
        $index = $artikel->firstItem();
        return view('paketPendidikan.index', compact('artikel', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriArtikel = KategoriArtikel::where('nama', config('constants.paket_pendidikan'))->get();
        return view('paketPendidikan.create', compact('kategoriArtikel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $artikel = new Artikel();
        if ($request->foto) {
            $rules = [
                'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
                'judul' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect('/admin/paket-pendidikan/add')->with('message', Helper::displayString(Lang::get('static.image_too_large'), Lang::get('static.failed')));
            }
            $image = $request->file('foto');
            $extension = $image->getClientOriginalExtension();
            Storage::disk('public')->put($image->getFilename() . '.' . $extension, File::get($image));
            $file_name = $image->getFilename() . '.' . $extension;
            $artikel->foto = url('/uploads/'.$file_name);
        }

        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->deskripsi_singkat = $request->deskripsi_singkat;
        $artikel->id_kategori = $request->id_kategori;
        $artikel->status = $request->status;
        $artikel->created_by = Session::get('nip');
        $artikel->save();

        $artikel = Artikel::latest()->first();
        return redirect('/admin/paket-pendidikan')->with('message', Helper::displayString(Lang::get('static.success_message'), Lang::get('static.success')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $artikel)
    {
        $id = base64_decode($artikel);
        $artikel = Artikel::find($id);
        $kategoriArtikel = KategoriArtikel::where('nama', config('constants.paket_pendidikan'))->get();
        $artikel->view_only = (boolean) $request->query('view') ?? (boolean) 'false';

        return view('paketPendidikan.edit', compact('artikel', 'kategoriArtikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $artikel)
    {
        $id = base64_decode($artikel);
        $artikel = Artikel::find($id);
        if ($request->foto) {
            $rules = [
                'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
                'judul' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect('/admin/paket-pendidikan')->with('message', Helper::displayString(Lang::get('static.image_too_large'), Lang::get('static.failed')));
            }
            $image = $request->file('foto');
            $extension = $image->getClientOriginalExtension();
            Storage::disk('public')->put($image->getFilename() . '.' . $extension, File::get($image));
            $file_name = $image->getFilename() . '.' . $extension;
            $artikel->foto = url('/uploads/'.$file_name);
        }

        $artikel->judul = $request->judul;
        $artikel->deskripsi = $request->deskripsi;
        $artikel->deskripsi_singkat = $request->deskripsi_singkat;
        $artikel->id_kategori = $request->id_kategori;
        $artikel->status = $request->status;
        $artikel->updated_at = now();
        $artikel->updated_by = Session::get('nip');
        $artikel->save();

        $artikel = Artikel::latest()->first();
        return redirect('/admin/paket-pendidikan')->with('message', Helper::displayString(Lang::get('static.success_message'), Lang::get('static.success')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        $artikel::destroy($artikel->id);
        return response()->json(Helper::returnResponse(Lang::get('static.delete_success_message'), Lang::get('static.success_code'), Lang::get('static.success')), Lang::get('static.success_code'));
    }
}
