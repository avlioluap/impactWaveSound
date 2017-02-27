var musicSearchType = "artist";
var musicSearchPage = 1;
/**
 * [musicChangeFormUrl alterar o url do form de pesquisa em music]
 * @param  {[string]} href [attr vindo o link do nav]
 */
function musicChangeFormUrl( href )
{
	$("#musicSearchForm").attr('action', '/api/lastfm/'+href);
}
/**
 * [musicAjaxSearch ajax request]
 */
function musicAjaxSearch ( type , data) {
  	return $.ajax({
		method: 'GET',
		url: "/api/lastfm/"+type,
    	data: { search: type, value: data, page: musicSearchPage },
	    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
}

function musicSearch()
{
	$("#musicSearchForm").submit( function( event ){
		//esconder section de erro
		$("musicSearchResultsError").css('display', 'none');
		//
	  	data = $("input[name=musicPesquisa]").val();
	  	//mostrar erro caso input esteja vazio
	  	if ( $("input[name=musicPesquisa]").val().length == 0)
	  	{
	  		createMusicErrorMsg("blankInput");
	  		return false;
	  	}
	  	//mostrar loading gif
		$("#loadingGif").addClass('d-flex').fadeIn();

		//limpar dados de #musicSearchResults
		$("#musicSearchResults").html('');

	    //search for the keyword typed in the input
		musicAjaxSearch( musicSearchType, data ).done(function( data ) {

			if (data.results.artistmatches.artist.length > 0)
			{
				var deafultBlock = $("#musicDefaultThumb");

				$.each(data.results.artistmatches.artist, function(index, val) {
					//if ( val.image[3]['#text'] != "" )
					//{
						var clonedBlock = deafultBlock.clone().removeClass('hide');

						clonedBlock.appendTo('#musicSearchResults');
						//cover
						clonedBlock.find('.coverImg').attr('src', val.image[3]['#text']);
						//nome
						clonedBlock.find('.thumbTitle').html(val.name);
						//desc
						//clonedBlock.find('.thumbShort').html(val.name);
						//data-mbid
						//}
				});
			} else {
				//TODO: mostrar que nao obteve resultados
				alert("nehum resultado");
			}

			//esconder loading gif
			$("#loadingGif").removeClass('d-flex').fadeOut();

		}).fail(function()
		{
			console.log("Someting went wrong please try again!!!");
			$("#loadingGif").removeClass('d-flex').fadeOut();
		});
	return false;
  });
}

$(document).ready(function($) {
	//music top menu click
	$("#musicTopMenu a").on('click', function( event ){
		//load section searchArea with the respective href
		musicChangeFormUrl( $(this).attr('href') );
		//mostrar active link
		$(".nav > a").removeClass("active");
		$(this).addClass('active');
		//alter searchType
		musicSearchType = $(this).attr('href');
		//alterar fundo
		event.preventDefault();
	});

	//music form submit
	musicSearch();
	//TODO: music pagination
});