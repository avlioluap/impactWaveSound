<?php

namespace App\Http\Controllers;

use App\Music;
use App\Album;
use App\Track;
use App\LastFm;
use Response;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd(Album::all());
        return view('pages.music.music');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function artistAlbums($artist)
    {
        //procurar albums do artista
        $data = LastFm::searchArtistAlbum($artist);
        $searchError = LastFm::getErrorMsg($data);
        $obj = ($searchError) ? $searchError : $data->topalbums->album;

        return view('pages.music.artistAlbums')
            ->with("albums", $obj)
            ->with("artist", $artist);
    }

    public function albumInfo($artist, $album)
    {
        //procurar info do album
        $data = LastFm::searchAlbumInfo($artist, $album);
        $searchError = LastFm::getErrorMsg($data);
        $obj = ($searchError) ? $searchError : $data->album;

        //more by this artist
        $moreByArtist = LastFm::searchArtistAlbum($artist, '', 20)->topalbums->album;
        //
        $x = 1;
        $more = [];
        $arrAlbumNames = [];
        while ( $x <= 5) {
            $rand = array_rand($moreByArtist);

            if( isset($moreByArtist[$rand]->name) )
            {

                if( $obj->name != $moreByArtist[$rand]->name )
                {
                    if(!in_array($moreByArtist[$rand]->name, $arrAlbumNames))
                    {
                        array_push($more, $moreByArtist[$rand]);
                        array_push($arrAlbumNames, $moreByArtist[$rand]->name);
                        $x++;
                    }
                }
            }
        }
        //

        return view('pages.music.albumInfo')
            ->with("album", $obj)
            ->with("moreBy", $more);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function show(Music $music)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function edit(Music $music)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Music $music)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function destroy(Music $music)
    {
        //
    }
}
