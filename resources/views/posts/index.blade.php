@extends('backend/dashboard/layouts/app')

@section('breadcrumb')
   <a href="{{ route('home') }}">@lang('backend.breadcrumbs_dashboard')</a> / @lang('posts.header_browse')
@endsection


@section('content')
<div class="card">
	<div class="card-header"><h3 class="float-start">@lang('posts.header_browse')</h3><div class="float-end"><a class="btn btn-success" href="{{ route('posts.create') }}">@lang('index.action_create')</a></div></div>
	<div class="card-body">
	<table class="table table-striped table-hover">
	  <thead>
		<tr"><th>@lang('posts.datafield_title')</th><th>@lang('posts.datafield_is_published')</th><th>@lang('posts.datafield_is_featured')</th><th>@lang('posts.datafield_is_pinned')</th>
	  </thead>
	  <tbody>
  @if( $rows->count() > 0 )
		  
	  @foreach($rows as $row)
		<tr role="button" onclick="window.location.replace('{{ route('posts.show', $row->id) }}');"><td>{{ $row->title }}</td><td>{{ $row->is_published ? 'yes' : 'no'}}</td><td>{{ $row->is_featured }}</td><td>{{ $row->pinned }}</td></tr>
	  @endforeach
	  
  @else
		<tr><td colspan="4">@lang('index.no_records_found')</td></tr>
  @endif
	  </tbody>
	</table>
	</div>
	<div class="card-footer">
		{!! $rows->links() !!}
	</div>
</div>
@endsection