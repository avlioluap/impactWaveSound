<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LastFm extends Model
{
    public $lastFm;
    public static $lastFmKey = "4b07c3fad8d2567ab1fa1ae07ba73319"; //TODO: dado vir da DB

    /**
     * [searchData usado em AjaxRequestController@music]
     * @param  [type]  $search [description]
     * @param  [type]  $value  [description]
     * @param  integer $page   [description]
     * @return [type]          [description]
     */
    public static function searchData($search, $value, $page=1)
    {

    	$url = "http://ws.audioscrobbler.com/2.0/?method=".$search.".search&".$search."=".$value."&page=".$page."&api_key=".self::$lastFmKey."&limit=100&format=json";
		$json = file_get_contents($url);
		$obj = json_decode($json);

    	return $obj;
    }
    /**
     * [searchArtistAlbum usado em MusicController@artistAlbums, MusicController@albumInfo]
     * @param  [type] $artist [description]
     * @param  string $mbid   [description]
     * @return [type]         [description]
     */
    public static function searchArtistAlbum($artist, $limit=100)
    {
        $url = "http://ws.audioscrobbler.com/2.0/?method=artist.gettopalbums&artist=".$artist."&autocorrect=1&api_key=".self::$lastFmKey."&limit=".$limit."&format=json";
        $json = file_get_contents($url);
        $obj = json_decode($json);

        return $obj;
    }

    public static function searchAlbumInfo($artist, $album)
    {
        $url = "http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=".self::$lastFmKey."&artist=".$artist."&album=".$album."&format=json";
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
