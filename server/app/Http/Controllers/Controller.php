<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function response($body ,$status = true, $http_status = 200 )
    {

        $retorno = [
            'status' => $status,
            'data' => $body
        ];
        
        return response()->json($retorno, $http_status, [JSON_HEX_QUOT, JSON_HEX_TAG])->header('Content-Type', 'application/json; charset=UTF8');
    }
}
