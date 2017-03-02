@extends('layouts.appDefault')

@section('content')
    <div class="container-fluid d-flex flex-column fullHeight">

        <section id="musicTopMenu">
        	<nav class="nav">
        		<a href="artist" class="active">@lang('music.navArtist')</a>
        		<a href="album">@lang('music.navAlbum')</a>
        		<!--<a href="track">@lang('music.navTrack')</a>-->
        	</nav>
        </section>

        <section id="musicSearchArea">
			<form id="musicSearchForm" class="form-horizontal" role="form" method="POST" action="{{ route('music.search') }}">
		    	{{ csrf_field() }}
		    	<div class="inputWrap form-group{{ $errors->has('musicSearch') ? 'has-error' : '' }}">
		    		<i class="fa fa-search" aria-hidden="true"></i>
                    <input type="hidden" name="musicSearchType" value="{{ old('musicSearchType', 'artist') }}">
		    		<input id="musicSearchInput" type="text" class="form-control" name="musicSearch" value="{{ old('musicSearch') }}" >
                    <label for="musicSearch" class="control-label"></label>
		    	</div>
		    </form>
        </section>

        <!-- default thumb que uso para gerar as thumbnails -->
    	<article id="musicDefaultThumb" class="thumbWrap hide col-xs-12 col-md-3 col-lg-2">
    		<div class="thumbImg">
    			<img src="" alt="" class="coverImg">
    			<div class="thumbOverlay d-flex align-items-center justify-content-center">
    				<a href="" data-mbid="" class="viewSearch"><i class="fa fa-search" aria-hidden="true"></i></a>
    			</div>
    		</div>
    		<div class="thumFooter">
    			<span class="thumbTitle"></span>
    			<span class="thumbShort"></span>
    		</div>
    	</article>

        <section id="musicSearchResults" class="row"></section>


        <section id="musicSearchResultsError" class="align-items-center justify-content-center">
            <i class="fa fa-frown-o" aria-hidden="true"></i>
            <h1>Error</h1>
            <div class="mensagem"></div>
        </section>

     </div>
</div>
@endsection