@extends('backend/dashboard/layouts/app')


@section('breadcrumb')
   <a href="{{ route('home') }}">@lang('backend.breadcrumbs_dashboard')</a> / <a href="{{ route('users.index') }}">@lang('users.header_browse')</a> / @lang('users.header_show')
@endsection


@section('content')

<div class="card">
	<div class="card-header"><h3 class="float-start">@lang('users.header_create')</h3><div class="float-end"></div></div>
	<div class="card-body">
	  <div class="border rounded p-1 mb-1">
	   <div class="bg-light p-1">@lang('users.datafield_name')</div>
	   <div>{{ $user->name }}</div>
	  </div>
	  <div class="border rounded p-1 mb-1">
	   <div class="bg-light p-1">@lang('users.datafield_email')</div>
	   <div>{{ $user->email }}</div>
	  </div>
	  <div class="">
	  
	  <span class="badge @if($user->is_active) text-bg-success @else badge text-bg-secondary @endif">@lang('users.datafield_is_active')</span>
	  
	  @foreach($user->roles as $role)
	  <span class="badge text-bg-success">{{ $role->name }}</span>
	  @endforeach
	  
	  <span class="badge text-bg-primary">{{ __('index.title', [], $user->language) }}</span>
	  
	  
	  @if($user->facebook) <a href="{{ $user->facebook }}"><i class="fa fa-facebook fa-2x p-1 border rounded"></i></a> @endif
	  @if($user->twitter) <a href="{{ $user->twitter }}"><i class="fa fa-twitter fa-2x p-1 border rounded"></i></a> @endif
	  @if($user->instagram) <a href="{{ $user->instagram }}"><i class="fa fa-instagram fa-2x p-1 border rounded"></i></a> @endif
	  
	  </div>
	</div>
	<div class="card-footer text-end">
		<a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}">@lang('index.action_edit')</a>
		<a class="btn btn-danger" href="{{ route('users.todelete', $user->id) }}">@lang('index.action_delete')</a>
		<a href="{{ route('users.index') }}" class="btn btn-secondary">@lang('index.action_cancel')</a>
	</div>
</div>
@endsection
