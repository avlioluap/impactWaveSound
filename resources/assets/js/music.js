var musicSearchPage = 1;
var deafultBlock = $("#musicDefaultThumb");
/**
 * [musicChangeFormUrl alterar o url do form de pesquisa em music]
 * @param  {[string]} href [attr vindo o link do nav]
 */
function musicChangeType( option )
{
	$("input[name=musicSearchType]").val( option );
}

function showMusicErrorMsg(errors)
{
    $("#loadingGif").removeClass('d-flex').fadeOut();
    $("#musicSearchResultsError .mensagem").html(errors);
    $("#musicSearchResultsError").css('display', 'flex');
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
		$("#musicSearchResults").empty();

	    //search for the keyword typed in the input
		musicAjaxSearch( $("input[name=musicSearchType]").val(), data ).done(function( data ) {

			if ($("input[name=musicSearchType]").val() == "artist") { generateThumbs("artist", data ); }
			if ($("input[name=musicSearchType]").val() == "album" ) { generateThumbs("album", data); }

			//esconder loading gif
			$("#loadingGif").removeClass('d-flex').fadeOut();
		}).fail(function( data ) {
            var errors = '';
            for(datos in data.responseJSON){
                errors += data.responseJSON[datos] + '<br>';
            }
            showMusicErrorMsg(errors)
		});
	return false;
  });
}

function generateThumbs ( type, data )
{
	var obj,
		href
		nombid = 0;
	//caso for para artistas
	if (type == "artist") { obj = data.results.artistmatches.artist; href = "/music/artistalbums/"; }
	//caso for paara albums
	if (type == "album") { 	obj = data.results.albummatches.album; href = "/music/albuminfo/"; }
	//caso for para musicas

	if ( obj.length > 0)
	{
		//each loop
		$.each(obj, function(index, val) {

			if (val.mbid.length > 0)
			{
				var clonedBlock = deafultBlock.clone().removeClass('hide');

				clonedBlock.appendTo('#musicSearchResults');
				//cover TODO: por uma imagem default caso nao tenha iumagem
				clonedBlock.find('.coverImg').attr('src', val.image[3]['#text']);
				//nome
				clonedBlock.find('.thumbTitle').html(function(){
					if (type == "artist") { return val.name; }
					if (type == "album") { return val.artist+'<br>'+val.name; }
				});
				//link
				clonedBlock.find('.viewSearch').attr("href", function(){
					if (type == "artist") { return href+val.name.replace(/\s/g,"-")+'/'+val.mbid; }
					if (type == "album") { return href+val.artist.replace(/\s/g,"-")+'/'+val.name.replace(/\s/g,"-"); }
				});
				//data-cover
				clonedBlock.find('.viewSearch').attr("data-cover", val.image[3]['#text']);

				mbid = 1;
			}
		});
		//
	} else {
		//mostrar que nao obteve resultados
        showMusicErrorMsg("No match found.")
	}

	//error count caso nao haja mbids
	if ( nombid > 0)
	{
		showMusicErrorMsg("No match found.")
	}
	//
}

function searchRcTable( value )
{
	$.each( $(".tableTr"), function(index, val) {
		if ( $(this).attr('data-search').search(value.toLowerCase()) == -1 )
		{
			$(this).fadeOut();
		} else {
			$(this).fadeIn();
		}
	});
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

    //ao clickar nos links da thumb
    $("#musicSearchResults").on('click', '.viewSearch', function(){
    	$("#rightContent").empty();
    	//
    	var cover = $(this).attr('data-cover');
        $("#rightContent").load($(this).attr('href'), function() {
        	//mostrar imagem do thum selecionado
            $("#rightContent").find('.artistInfoThumbImg').attr('src', cover);
        });
        //
        openRightContent();
        //
        return false;
    });

	//rContent table search
	$("#rightContent").on("change paste keypress", ":input[name='musicRcFilter']", function ()
	{
		searchRcTable( $("input[name='musicRcFilter']").val() );
	});
	//

	//TODO: music pagination
});