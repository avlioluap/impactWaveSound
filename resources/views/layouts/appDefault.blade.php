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
			@yield('content')
		</div>
	</div>
@endsection