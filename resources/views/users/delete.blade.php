@extends('backend/dashboard/layouts/app')


@section('breadcrumb')
   <a href="{{ route('home') }}">@lang('backend.breadcrumbs_dashboard')</a> / <a href="{{ route('users.index') }}">@lang('users.header_browse')</a> / @lang('users.header_delete')
@endsection


@section('content')

<div class="card text-bg-warning">
	<div class="card-header"><h3 class="float-start">@lang('users.header_delete')</h3><div class="float-end"></div></div>
	<div class="card-body">
	  <div class="border rounded p-1 mb-1">
	   <div class="bg-darker-200  p-1">@lang('users.datafield_name')</div>
	   <div>{{ $user->name }}</div>
	  </div>
	  <div class="border rounded p-1 mb-1">
	   <div class="bg-darker-200  p-1">@lang('users.datafield_email')</div>
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
	<div class="card-footer">
	  <div class="float-start fw-bold">@lang('users.warn_delete')</div>
	  <div class="float-end">
	  <form method="post" action="{{ route('users.destroy', $user->id) }}">
		@csrf @method('delete')
		<button class="btn btn-danger" type="submit">@lang('index.action_delete')</button>
		<a href="{{ route('users.index') }}" class="btn btn-secondary">@lang('index.action_cancel')</a>
	  </form>
	  </div>
	</div>
</div>
@endsection
