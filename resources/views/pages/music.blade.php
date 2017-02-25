@extends('layouts.appDefault')

@section('content')
    <div class="container-fluid">

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

        <!-- default thumb que uso para gerar as thumbnails -->
    	<article id="musicDefaultThumb" class="thumbWrap col-xs-12 col-md-3 col-lg-2">
    		<div class="thumbImg">
    			<img src="" alt="">
    			<div class="thumbOverlay d-flex align-items-center justify-content-center">
    				<span><i class="fa fa-search" aria-hidden="true"></i></span>
    			</div>
    		</div>
    		<div class="thumFooter">
    			<span class="thumbTitle">11</span>
    			<span class="thumbShort">22</span>
    		</div>
    	</article>

        <section id="musicSearchResults" class="row">
        </section>
    </div>
</div>
@endsection