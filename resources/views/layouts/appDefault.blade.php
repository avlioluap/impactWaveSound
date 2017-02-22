@extends('layouts.master')

@section('body')
	<div class="appWrapper">
		<div id="mainMenu">
			@include('pages.sidebar')
		</div>
		<div id="mainContent">
			@yield('content')
		</div>
	</div>
@endsection