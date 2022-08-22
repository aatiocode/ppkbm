<?php

namespace App\Helpers;

use DB;
use App\Models\UserAdmin;
use App\Models\Menu;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Lang;
use Illuminate\Support\Facades\Session;

class AmcHelper
{
    public static function markingStatus($data)
    {
        $status = '<b class="text-danger">Tidak Aktif</b>';
        if ($data) {
            $status = '<b class="text-success">Aktif</b>';
        }
        return $status;
    }

    public static function displayString($message, $type)
    {
        return '<div class="alert alert-'.$type.' alert-block m-0 text-center">
		<button type="button" class="close" data-dismiss="alert">×</button> 
		<strong>'.$message.'</strong>
		</div>';
    }

    public static function displayActiveGroup($id, $isActive = "", $isView = false)
    {
        return '<select class="custom-select" id="'.$id.'" name="'.$id.'" '.($isView ? "disabled": "").'>
      <option value="0" '. ($isActive == 0 ? "selected" : "") .'>False</option>
      <option value="1" '. ($isActive == 1 ? "selected" : "") .'>True</option>
    </select>';
    }

    public static function returnResponse($message, $status, $response)
    {
        return array(
      'message' => $message,
      'status' => $status,
      'response' => $response
    );
    }
}
