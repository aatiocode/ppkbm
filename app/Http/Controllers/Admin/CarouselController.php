<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\KategoriGaleri;
use Illuminate\Http\Request;
use App\Helpers\AmcHelper as Helper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Lang;
use Validator;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::getIndexAttribute(config('constants.carousel_halaman_utama'));
        $index = $galeri->firstItem();
        return view('carousel.index', compact('galeri', 'index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriGaleri = KategoriGaleri::where('nama', config('constants.carousel_halaman_utama'))->get();
        return view('carousel.create', compact('kategoriGaleri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galeri = new Galeri();
        if ($request->foto) {
            $rules = [
                'judul' => 'required',
                'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect('/admin/carousel/add')->with('message', Helper::displayString(Lang::get('static.image_too_large'), Lang::get('static.failed')));
            }
            $image = $request->file('foto');
            $extension = $image->getClientOriginalExtension();
            Storage::disk('public')->put($image->getFilename() . '.' . $extension, File::get($image));
            $file_name = $image->getFilename() . '.' . $extension;
            $galeri->foto = url('/uploads/'.$file_name);
        }

        $galeri->judul = $request->judul;
        $galeri->id_event = $request->id_event;
        $galeri->video = $request->video;
        $galeri->status = $request->status;
        $galeri->created_by = Session::get('nip');
        $galeri->updated_by = Session::get('nip');
        $galeri->save();
        
        $galeri = Galeri::latest()->first();
        return redirect('/admin/carousel/')->with('message', Helper::displayString(Lang::get('static.success_message'), Lang::get('static.success')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $galeri)
    {
        $id = base64_decode($galeri);
        $galeri = Galeri::find($id);
        $galeri->view_only = (boolean) $request->query('view') ?? (boolean) 'false';
        $kategoriGaleri = KategoriGaleri::get();

        return view('carousel.edit', compact('galeri', 'kategoriGaleri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $galeri)
    {
        $id = base64_decode($galeri);
        $galeri = Galeri::find($id);
        if ($request->foto) {
            $rules = [
                'judul' => 'required',
                'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect('/admin/carousel/')->with('message', Helper::displayString(Lang::get('static.image_too_large'), Lang::get('static.failed')));
            }
            $image = $request->file('foto');
            $extension = $image->getClientOriginalExtension();
            Storage::disk('public')->put($image->getFilename() . '.' . $extension, File::get($image));
            $file_name = $image->getFilename() . '.' . $extension;
            $galeri->foto = url('/uploads/'.$file_name);
        }

        $galeri->judul = $request->judul;
        $galeri->id_event = $request->id_event;
        $galeri->video = $request->video;
        $galeri->status = $request->status;
        $galeri->created_by = Session::get('nip');
        $galeri->updated_by = Session::get('nip');
        $galeri->save();

        $galeri = Galeri::latest('updated_at')->first();
        return redirect('/admin/carousel/')->with('message', Helper::displayString(Lang::get('static.success_message'), Lang::get('static.success')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeri $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeri $galeri)
    {
        $galeri::destroy($galeri->id);
        return response()->json(Helper::returnResponse(Lang::get('static.delete_success_message'), Lang::get('static.success_code'), Lang::get('static.success')), Lang::get('static.success_code'));
    }
}
