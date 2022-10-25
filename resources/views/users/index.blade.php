@extends('backend/dashboard/layouts/app')

@section('breadcrumb')
   <a href="{{ route('home') }}">@lang('backend.breadcrumbs_dashboard')</a> / @lang('users.header_browse')
@endsection


@section('content')
<div class="card">
	<div class="card-header"><h3 class="float-start">@lang('users.header_browse')</h3><div class="float-end"><a class="btn btn-success" href="{{ route('users.create') }}">@lang('index.action_create')</a></div></div>
	<div class="card-body">
	<table class="table table-striped table-hover">
	  <thead>
		<tr"><th>@lang('users.datafield_name')</th><th>@lang('users.datafield_email')</th><th>@lang('users.datafield_is_active')</th><th>@lang('users.datafield_roles')</th>
	  </thead>
	  <tbody>
	  @foreach($rows as $row)
		<tr role="button" onclick="window.location.replace('{{ route('users.show', $row->id) }}');"><td>{{ $row->name }}</td><td>{{ $row->email}}</td><td><span class="badge @if($row->is_active) text-bg-success @else text-bg-secondary @endif">@lang('users.datafield_is_active')</span></td><td>@foreach($row->roles as $role) <span class="">{{$role->name}}</span> @endforeach</td></tr>
	  @endforeach
	  </tbody>
	  <tfoot>
		<tr><td colspan="4">{{ $rows->links() }}</td></tr>
	  </tfoot>
	</table>
	</div>
	<div class="card-footer">
	</div>
</div>
@endsection