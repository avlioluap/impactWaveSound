var musicSearchPage = 1;
/**
 * [musicChangeFormUrl alterar o url do form de pesquisa em music]
 * @param  {[string]} href [attr vindo o link do nav]
 */
function musicChangeType( option )
{
	$("input[name=musicSearchType]").val( option );
}
/**
 * [musicAjaxSearch ajax request]
 */
function musicAjaxSearch ( type , data) {
  	return $.ajax({
		method: 'GET',
		url: "/api/lastfm/search",
    	data: { musicType: type, musicPesquisa: data, musicPage: musicSearchPage },
	    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
}

function musicSearch()
{

	$("#musicSearchForm").submit( function( event ){
		//esconder section de erro
		$("#musicSearchResultsError").css('display', 'none');
		//
	  	data = $("input[name=musicSearch]").val();
	  	//mostrar loading gif
		$("#loadingGif").addClass('d-flex').fadeIn();

		//limpar dados de #musicSearchResults
		$("#musicSearchResults").html('');

	    //search for the keyword typed in the input
		musicAjaxSearch( $("input[name=musicSearchType]").val(), data ).done(function( data ) {

			if ($("input[name=musicSearchType]").val() == "artist")
			{
				musicSearchGenerateArtistThumbs( data );
			}

			if ($("input[name=musicSearchType]").val() == "album")
			{
				musicSearchGenerateAlbumThumbs( data);
			}

			//esconder loading gif
			$("#loadingGif").removeClass('d-flex').fadeOut();

		}).fail(function( data ) {

            var errors = '';
            for(datos in data.responseJSON){
                errors += data.responseJSON[datos] + '<br>';
            }

            $("#loadingGif").removeClass('d-flex').fadeOut();

            $("#musicSearchResultsError .mensagem").html(errors);
            $("#musicSearchResultsError").css('display', 'flex');


		});
	return false;
  });
}

function musicSearchGenerateArtistThumbs( data )
{
	if (data.results.artistmatches.artist.length > 0)
	{
		var deafultBlock = $("#musicDefaultThumb");
		$.each(data.results.artistmatches.artist, function(index, val) {

			var clonedBlock = deafultBlock.clone().removeClass('hide');

			//if (val.mbid != "") {
				clonedBlock.appendTo('#musicSearchResults');
				//cover TODO: por uma imagem default caso nao tenha iumagem
				clonedBlock.find('.coverImg').attr('src', val.image[3]['#text']);
				//nome
				clonedBlock.find('.thumbTitle').html(val.name);
				//link
				clonedBlock.find('.viewSearch').attr('href', '/music/getartistalbums/'+val.name+'/'+val.mbid);
			//}
		});

	} else {
		//TODO: mostrar que nao obteve resultados
		console.log("nehum resultado");
	}

}

function musicSearchGenerateAlbumThumbs( data )
{
	console.log(data);
}

$(document).ready(function($) {
	//music top menu click
	$("#musicTopMenu a").on('click', function( event ){

		//load section searchArea with the respective href
		musicChangeType( $(this).attr('href') );

		//mostrar active link
		$(".nav > a").removeClass("active");
		$(this).addClass('active');

		//alterar fundo
		//

		event.preventDefault();
	});

	//music form submit
	musicSearch();
	//TODO: music pagination
});