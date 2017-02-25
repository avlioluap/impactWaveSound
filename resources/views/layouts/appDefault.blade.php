@extends('layouts.master')

@section('body')
	<div class="appWrapper">
		<div id="mainMenu">
			@include('pages.sidebar')
		</div>
		<div id="searchSideBar" class="closed">
			@include('pages.sidebarSearch')
		</div>
		<div id="mainContent">
			<div id="mainContentOverlay"></div>
			<div id="loadingGif" class="align-items-center justify-content-center">
				<img src="{{ asset('images/loading.gif') }}" alt="{{ config('app.name', 'ImpactWaveSound') }}">
			</div>
			@yield('content')
		</div>
	</div>
@endsection