@extends('layouts.appDefault')

@section('content')
    <div class="container">

        <section id="musicTopMenu">
        	<nav class="nav">
        		<a href="artist" class="active">@lang('music.navArtist')</a>
        		<a href="album">@lang('music.navAlbum')</a>
        		<a href="track">@lang('music.navTrack')</a>
        	</nav>
        </section>

        <section id="musicSearchArea">
			<form id="musicSearchForm" class="form-horizontal" role="form" method="POST" action="{{ url('/api/lastfm/artist') }}">
		    	{{ csrf_field() }}
		    	<div class="inputWrap">
		    		<i class="fa fa-search" aria-hidden="true"></i>
		    		<input id="musicSearchInput" type="text" class="form-control" name="musicPesquisa" value="{{ old('musicPesquisa') }}" >
		    	</div>
		    </form>
        </section>

        <section id="musicSearchResults">
        	#
        </section>

    </div>
</div>
@endsection