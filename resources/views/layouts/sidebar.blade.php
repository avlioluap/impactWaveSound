<nav class="sidebar">
    <div class="sidebar-header">
		<a class="sidebar-brand" href="{{ url('/') }}" title="{{ config('app.name', 'ImpactWaveSound') }}">
			<img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'ImpactWaveSound') }}">
		</a>
    </div>
    <div class="sidebar-body">
    	<ul>
            <li {{{ (Request::is('search') ? 'class=active' : '') }}} data-sidebar="true">
            	<a href="#" class="sideBarLink d-flex flex-column justify-content-center">
            		<i class="fa fa-search" aria-hidden="true"></i>
            		<span>@lang('sidebar.sideBarSearch')</span>
            	</a>
            </li>
            <li {{{ (Request::is('browse', '/') ? 'class=active' : '') }}} >
            	<a href="{{ url('/browse') }}" class="sideBarLink d-flex flex-column justify-content-center">
            		<i class="fa fa-list-ul" aria-hidden="true"></i>
            		<span>@lang('sidebar.sideBarBrowse')</span>
            	</a>

            </li>
            <li {{{ (Request::is('playlist') ? 'class=active' : '') }}}>
            	<a href="{{ url('/playlist') }}" class="sideBarLink d-flex flex-column justify-content-center">
	            	<i class="fa fa-youtube-play" aria-hidden="true"></i>
            		<span>@lang('sidebar.sideBarPlaylist')</span>
            	</a>

            </li>
            <li {{{ (Request::is('music') ? 'class=active' : '') }}} >
            	<a href="{{ url('/music') }}" class="sideBarLink d-flex flex-column justify-content-center">
	            	<i class="fa fa-headphones" aria-hidden="true"></i>
            		<span>@lang('sidebar.sideBarMusic')</span>
            	</a>
            </li>
            <li {{{ (Request::is('account') ? 'class=active' : '') }}} >
            	<a href="{{ url('/account') }}" class="sideBarLink d-flex flex-column justify-content-center">
            		<i class="fa fa-user" aria-hidden="true"></i>
            		<span>{{ Auth::getUser()->name }}</span>
            	</a>
            </li>
            <li {{{ (Request::is('settings') ? 'class=active' : '') }}}>
            	<a href="{{ url('/settings') }}" class="sideBarLink d-flex flex-column justify-content-center">
            		<i class="fa fa-cog" aria-hidden="true"></i>
            		<span>@lang('sidebar.sideBarSettings')</span>
            	</a>
            </li>
    	</ul>
    </div>
</nav>