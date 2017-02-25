var musicSearchType = "artist";
/**
 * [musicChangeFormUrl alterar o url do form de pesquisa em music]
 * @param  {[string]} href [attr vindo o link do nav]
 */
function musicChangeFormUrl( href )
{
	$("#musicSearchForm").attr('action', '/api/lastfm/'+href);
}

function musicAjaxSearch ( type , data) {
  	return $.ajax({
		method: 'GET',
		url: "/api/lastfm/"+type,
    	data: { search: type, value: data },
	    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
	});
}

function musicSearch()
{
  $("#musicSearchForm").submit( function( event ){
  	data = $("input[name=musicPesquisa]").val();
    //search for the keyword typed in the input
	musicAjaxSearch( musicSearchType, data ).done(function( data ) {
		console.log("hey");
	}).fail(function()
	{
		alert("Someting went wrong please try again!!!");
	});
	event.preventDefault();
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
	//
});