<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests\MusicSearchRequest;
use Response;
use App\Http\Controllers\Controller;
use App\LastFm;

class AjaxRequestController extends Controller
{
    public function music(MusicSearchRequest $request)
    {
    	if( $request->ajax() )
    	{

    		$data = LastFm::searchData($request->input('musicType'), $request->input('musicPesquisa'), $request->input('musicPage'));

    		$searchError = LastFm::getErrorMsg($data);

    		return response()->json( ($searchError) ? $searchError : $data );

    	} else {

	    	return response()->json(["state" => "error", "msg" 	=> "Not a valid request!"]);
    	}
    }
}
