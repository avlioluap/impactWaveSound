<div class="container-fluid d-flex flex-column fullHeight">
	<section id="artistInfoHeader" class="d-flex flex-row">
		<div class="artistInfoThumb">
			<img src="" alt="" class="artistInfoThumbImg">
		</div>
		<div class="artistInfoText">
			<h2>{{ $album->name }}</h2>
			<h3>{{ $album->artist }}</h3>
		</div>
	</section>
	<section id="artistInfoListAlbums" data-link="{{ $album->url }}">
		<table class="table">
		  <thead>
		    <tr>
		      <th>@lang('music.tableRank')</th>
		      <th>@lang('music.tableTrack')</th>
		      <th><i class="fa fa-clock-o" aria-hidden="true"></i></th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($album->tracks->track as $song)
			    <tr class="tableTr" data-search="">
			      <td scope="row">{{ $song->{'@attr'}->rank }}</td>
			      <td>{{ $song->name }}</td>
			      <td>{{ gmdate("i:s", $song->duration) }}</td>
			    </tr>
		  	@endforeach
		  </tbody>
		</table>
	</section>

	<section id="moreAlbumsByArtist">
		<h3>More by {{ $album->artist }}</h3>
		<hr>
		@foreach($moreBy as $album)
    	<article class="thumbWrap">
    		<div class="thumbImg">
    			<img src="{{ $album->image[3]->{'#text'} }}" alt="{{ $album->name }}" class="coverImg">
    			<div class="thumbOverlay d-flex align-items-center justify-content-center">
    				<a href="" class="viewSearch" data-cover="{{ $album->image[3]->{'#text'} }}">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
    			</div>
    		</div>
    		<div class="thumFooter">
    			<span class="thumbTitle">{{ $album->name }}</span>
    			<span class="thumbShort"></span>
    		</div>
    	</article>
	  	@endforeach
	</section>
</div>