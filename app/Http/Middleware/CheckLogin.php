<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\AmcHelper as Helper;
use Lang;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->header('Authorization') && str_contains($request->header('Authorization'), 'Basic')) {
            $dataBasic =  explode(" ", $request->header('Authorization'));
            if ($dataBasic[1] === base64_encode(config('constants.header_username').':'.config('constants.header_password'))) {
                return $next($request);
            }
        }
        return response()->json(Helper::returnResponse(Lang::get('static.error'), Lang::get('static.unauthorized'), []), Lang::get('static.unauthorized'));
    }
}
