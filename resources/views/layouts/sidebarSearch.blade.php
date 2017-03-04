<section id="searchSidebarForm">
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/search/geral') }}">
    	{{ csrf_field() }}
    	<div class="inputWrap">
    		<i class="fa fa-search" aria-hidden="true"></i>
    		<input id="searchInput" type="text" class="form-control" name="pesquisa" value="{{ old('pesquisa') }}" >
    	</div>
    </form>
</section>

<section id="showAll">
	mostrar tudo
</section>

<section id="showFormResult">
	mostrar algums
</section>