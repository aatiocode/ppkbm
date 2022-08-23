<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Artikel;
use App\Models\Galeri;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

use App\Helpers\AmcHelper as Helper;
use Lang;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function artikel(Request $request)
    {
        try {
            $data = Artikel::getArtikelLanding();

            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), $data), Lang::get('static.success_code'));
        } catch (\Exception $e) {
            return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), []), Lang::get('static.bad_request'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function galeri(Request $request)
    {
        try {
            $data = Galeri::getGaleriLanding();

            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), $data), Lang::get('static.success_code'));
        } catch (\Exception $e) {
            return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), []), Lang::get('static.bad_request'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logo(Request $request)
    {
        try {
            $data = Artikel::getArtikelBeranda(config('constants.header_logo'));

            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), $data), Lang::get('static.success_code'));
        } catch (\Exception $e) {
            return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), []), Lang::get('static.bad_request'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function beranda(Request $request)
    {
        try {
            $data['galeri'] = Galeri::getGaleriBeranda();
            $data['tentangKami'] = Artikel::getArtikelBeranda(config('constants.tentang_kami'));
            $data['testimoni'] = Artikel::getArtikelBeranda(config('constants.testimoni'));
            $data['paketPendidikan'] = Artikel::getArtikelBeranda(config('constants.paket_pendidikan'));
            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), $data), Lang::get('static.success_code'));
        } catch (\Exception $e) {
            return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), []), Lang::get('static.bad_request'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tentangKami(Request $request)
    {
        try {
            $data['tentangKami'] = Artikel::getArtikelBeranda(config('constants.tentang_kami'));
            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), $data), Lang::get('static.success_code'));
        } catch (\Exception $e) {
            return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), []), Lang::get('static.bad_request'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function identitas(Request $request)
    {
        try {
            $data['identitas'] = Artikel::getArtikelBeranda(config('constants.identitas'));
            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), $data), Lang::get('static.success_code'));
        } catch (\Exception $e) {
            return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), []), Lang::get('static.bad_request'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visiMisi(Request $request)
    {
        try {
            $data['visiMisi'] = Artikel::getArtikelBeranda(config('constants.visi_misi'));
            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), $data), Lang::get('static.success_code'));
        } catch (\Exception $e) {
            return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), []), Lang::get('static.bad_request'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function programBelajar(Request $request)
    {
        try {
            $data['programBelajar'] = Artikel::getArtikelBeranda(config('constants.program_belajar'));
            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), $data), Lang::get('static.success_code'));
        } catch (\Exception $e) {
            return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), []), Lang::get('static.bad_request'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengajarStaff(Request $request)
    {
        try {
            $data['pengajarDanStaff'] = Artikel::getArtikelBeranda(config('constants.pengajar_dan_staff'));
            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), $data), Lang::get('static.success_code'));
        } catch (\Exception $e) {
            return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), []), Lang::get('static.bad_request'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lokasiSekolah(Request $request)
    {
        try {
            $data['lokasiSekolah'] = Artikel::getArtikelBeranda(config('constants.lokasi_sekolah'));
            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), $data), Lang::get('static.success_code'));
        } catch (\Exception $e) {
            return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), []), Lang::get('static.bad_request'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function artikelDetail(Request $request)
    {
        $id = base64_decode($request->query('id'));
        try {
            $artikel = Artikel::where('id', $id)->first();
            return response()->json(Helper::returnResponse(Lang::get('static.success'), Lang::get('static.success_code'), $artikel), Lang::get('static.success_code'));
        } catch (\Exception $e) {
            return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.bad_request'), []), Lang::get('static.bad_request'));
        }
    }
}
