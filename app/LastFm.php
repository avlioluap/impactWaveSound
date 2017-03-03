<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LastFm extends Model
{
    public $lastFm;
    public static $lastFmKey = "4b07c3fad8d2567ab1fa1ae07ba73319"; //TODO: dado vir da DB

    public static function searchData($search, $value, $page=1)
    {

    	$url = "http://ws.audioscrobbler.com/2.0/?method=".$search.".search&".$search."=".$value."&page=".$page."&api_key=".self::$lastFmKey."&format=json";
		$json = file_get_contents($url);
		$obj = json_decode($json);

    	return $obj;
    }

    /**
     * [getErrorMsg obter a mensagem de erro de pedidos a api da lastfm]
     * @param  [json] $jsonObj [json object do request feito a lastfm]
     * @return [null or string]          [devolve mensgaem em caso de erro]
     */
    public static function getErrorMsg($jsonObj)
    {
    	return ( isset($jsonObj->error) ) ? $jsonObj->message : null;
    }
}
