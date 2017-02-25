<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Response;
use App\Http\Controllers\Controller;
use App\LastFm;

class AjaxRequestController extends Controller
{
    public function music(Request $request)
    {
    	if( $request->ajax() )
    	{
    		$data = LastFm::searchData($request->input('search'), $request->input('value'), $request->input('page'));
    		$searchError = LastFm::getErrorMsg($data);
    		return response()->json( ($searchError) ? $searchError : $data );
    	} else {
	    	return response()->json(["state" => "error", "msg" 	=> "Not a valid request!"]);
    	}
    }
}
