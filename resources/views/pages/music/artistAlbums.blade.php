<div class="container-fluid d-flex flex-column fullHeight">
	<section id="artistInfoHeader" class="d-flex flex-row">
		<div class="artistInfoThumb">
			<img src="" alt="{{ $artist }}" class="artistInfoThumbImg">
		</div>
		<div class="artistInfoText">
			<h2>{{ $artist }}</h2>
		</div>
	</section>
	<section id="artistInfoListAlbums">
		<table class="table">
		  <thead>
		    <tr>
		      <th>#</th>
		      <th>@lang('music.tableCover')</th>
		      <th>
		    	<div class="inputWrap">
		    		<i class="fa fa-search" aria-hidden="true"></i>
		    		<input id="musicRcFilter" type="text" class="form-control" name="musicRcFilter" value="" placeholder="@lang('music.tableSearchPh')">
                    <label for="musicSearch" class="control-label"></label>
		    	</div>
		      </th>
		      <th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($albums as $album)
			    <tr class="tableTr" data-search="{{ strtolower($album->name) }}">
			      <td scope="row">
			      	<a href="{{ route('music.rcontent.album', ["artist"=>$artist, "album"=>$album->name]) }}" class="viewSearch">
			      		<i class="fa fa-search" aria-hidden="true"></i>
			      	</a>
			      </td>
			      <td width="200px"><img src="{{ $album->image[3]->{'#text'} }}" alt="{{ $album->name }}"></td>
			      <td>
			      	<h4>{{ $album->name }}</h4>
			      	<p>{{ $album->artist->name }}</p>
			      </td>
			    </tr>
		  	@endforeach
		  </tbody>
		</table>
	</section>
</div>