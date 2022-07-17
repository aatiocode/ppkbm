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
}
