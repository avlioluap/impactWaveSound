/**
 * [openClose função para abrir e fechar a segunda sidebar caso o li tenha o data-sidebar true]
 * @param  {[type]} a [a clicado do main sidebar]
 */
function openClose(a)
{
	if (a.parent('li').attr('data-sidebar') == "true")
	{
		if ( $("#searchSideBar").is(":hidden") )
		{
			$("#searchSideBar").removeClass('closed');
			$("#mainContentOverlay").show();
		}
		else
		{
			$("#searchSideBar").addClass('closed');
			$("#mainContentOverlay").hide();
		}
	}
}

$(document).ready(function($) {
	//
	$(".sidebar-body li a").on('click', function(){
		openClose($(this));
	});

	//se clicar na main app e a search bar tiver aberta
	$("#mainContent").click(function(event) {
		if ($("#searchSideBar").is(':visible'))
		{
			$("#searchSideBar").addClass('closed');
			$("#mainContentOverlay").hide();
		}
	});

});