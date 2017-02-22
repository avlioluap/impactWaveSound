<nav class="sidebar">
    <div class="sidebar-header">
		<a class="sidebar-brand" href="{{ url('/') }}" title="{{ config('app.name', 'ImpactWaveSound') }}">
			<img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'ImpactWaveSound') }}">
		</a>
    </div>
    <div class="sidebar-body">
    	<ul>
            <li {{ (Request::is('search') ? 'class=active' : '') }} >
            	<a href="{{ url('/search') }}" class="sideBarLink">
            		<i class="fa fa-search" aria-hidden="true"></i>
            		@lang('sidebar.search')
            	</a>
            </li>
            <li {{ (Request::is('browse') ? 'class=active' : '') }} >
            	<a href="{{ url('/browse') }}" class="sideBarLink">
            		<i class="fa fa-list-ul" aria-hidden="true"></i>
            		@lang('sidebar.browse')
            	</a>

            </li>
            <li {{ (Request::is('playlist') ? 'class=active' : '') }} >
            	<a href="{{ url('/playlist') }}" class="sideBarLink">
	            	<i class="fa fa-youtube-play" aria-hidden="true"></i>
            		@lang('sidebar.playlist')
            	</a>

            </li>
            <li {{ (Request::is('music') ? 'class=active' : '') }} >
            	<a href="{{ url('/music') }}" class="sideBarLink">
	            	<i class="fa fa-headphones" aria-hidden="true"></i>
            		@lang('sidebar.music')
            	</a>
            </li>
            <li {{ (Request::is('account') ? 'class=active' : '') }} >
            	<a href="{{ url('/account') }}" class="sideBarLink">
            		<i class="fa fa-user" aria-hidden="true"></i>
            		{{ Auth::getUser()->name }}
            	</a>
            </li>
            <li {{ (Request::is('settings') ? 'class=active' : '') }}>
            	<a href="{{ url('/settings') }}" class="sideBarLink">
            		<i class="fa fa-cog" aria-hidden="true"></i>
            		@lang('sidebar.settings')
            	</a>
            </li>
    	</ul>
    </div>
</nav>