@extends('backend/dashboard/layouts/app')

@section('breadcrumb')
   <a href="{{ route('home') }}">@lang('backend.breadcrumbs_dashboard')</a> / @lang('settings.header_browse')
@endsection


@section('content')
<div class="card">
	<div class="card-header"><h3 class="float-start">@lang('settings.header_browse')</h3></div>
	<div class="card-body">
		Under construction
	</div>
	<div class="card-footer"></div>
</div>
@endsection