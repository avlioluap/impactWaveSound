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
            		@lang('sidebar.search')
            	</a>
            </li>
            <li {{ (Request::is('browse') ? 'class=active' : '') }} >
            	<a href="{{ url('/browse') }}" class="sideBarLink">
            		@lang('sidebar.browse')
            	</a>

            </li>
            <li {{ (Request::is('playlist') ? 'class=active' : '') }} >
            	<a href="{{ url('/playlist') }}" class="sideBarLink">
            		@lang('sidebar.playlist')
            	</a>

            </li>            
            <li {{ (Request::is('music') ? 'class=active' : '') }} >
            	<a href="{{ url('/music') }}" class="sideBarLink">
            		@lang('sidebar.music')
            	</a>
            </li>
            <li {{ (Request::is('account') ? 'class=active' : '') }} >
            	<a href="{{ url('/account') }}" class="sideBarLink">
            		{{ Auth::getUser()->name }}
            	</a>
            </li>
            <li {{ (Request::is('settings') ? 'class=active' : '') }}>
            	<a href="{{ url('/settings') }}" class="sideBarLink">
            		@lang('sidebar.settings')
            	</a>
            </li>
    	</ul>
    </div>
</nav>