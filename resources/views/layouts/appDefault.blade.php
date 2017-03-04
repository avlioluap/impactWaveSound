@extends('layouts.master')

@section('body')
	<div class="appWrapper">
		<div id="mainMenu">
			@include('layouts.sidebar')
		</div>
		<div id="searchSideBar" class="closed">
			@include('layouts.sidebarSearch')
		</div>
		<div id="mainContent">
			<div id="mainContentOverlay"></div>
			<div id="loadingGif" class="align-items-center justify-content-center">
				<img src="{{ asset('images/loading.gif') }}" alt="{{ config('app.name', 'ImpactWaveSound') }}">
			</div>
			@yield('content')
			<div id="rightContent" class="closed"></div>
		</div>
	</div>
	<!-- Modal -->
	<div id="appModal" class="modal fade">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">

	        <h5 class="modal-title"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body"></div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>

	    </div>
	  </div>
	</div>
@endsection