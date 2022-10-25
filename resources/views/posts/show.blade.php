@extends('backend/dashboard/layouts/app')


@section('breadcrumb')
   <a href="{{ route('home') }}">@lang('backend.breadcrumbs_dashboard')</a> / <a href="{{ route('posts.index') }}">@lang('posts.header_browse')</a> / @lang('posts.header_show')
@endsection


@section('content')

<div class="card">
	<div class="card-header"><h3 class="float-start">@lang('posts.header_create')</h3><div class="float-end"></div></div>
	<div class="card-body">
	  <div class="border p-1 mb-1">
	   <div class="bg-light p-1">@lang('posts.datafield_title')</div>
	   <div>{{ $post->title }}</div>
	  </div>
	  <div class="border p-1 mb-1">
	   <div class="bg-light p-1">@lang('posts.datafield_short')</div>
	   <div>{!! $post->short !!}</div>
	  </div>
	  <div class="border p-1 mb-1">
	   <div class="bg-light p-1">@lang('posts.datafield_body')</div>
	   <div>{!! $post->body !!}</div>
	  </div>
	  <div class="">
	  <span class="badge text-bg-primary">{{ __('index.title', [], $post->language) }}</span>
	  <span class="badge @if($post->is_published) text-bg-success @else badge text-bg-secondary @endif">@lang('posts.datafield_is_published')</span>
	  <span class="badge @if($post->is_featured) text-bg-success @else badge text-bg-secondary @endif">@lang('posts.datafield_is_featured')</span>
	  <span class="badge @if($post->is_pinned) text-bg-success @else badge text-bg-secondary @endif">@lang('posts.datafield_is_pinned')</span>
	  <span class="badge @if($post->is_commentable) text-bg-success @else badge text-bg-secondary @endif">@lang('posts.datafield_is_commentable')</span>
	  <span class="badge @if($post->is_editable) text-bg-success @else badge text-bg-secondary @endif">@lang('posts.datafield_is_editable')</span>
	  <span class="badge @if($post->is_deleteable) text-bg-success @else badge text-bg-secondary @endif">@lang('posts.datafield_is_deleteable')</span>
	  </div>
	</div>
	<div class="card-footer">
		<a class="btn btn-warning" href="{{ route('posts.edit', $post->id) }}">@lang('index.action_edit')</a>
		<a class="btn btn-danger" href="{{ route('posts.todelete', $post->id) }}">@lang('index.action_delete')</a>
		<a href="{{ route('posts.index') }}" class="btn btn-secondary">@lang('index.action_cancel')</a>
	</div>
</div>
@endsection




{{--
is_published
false
published_at
null
is_featured
false
is_pinned
false
is_commentable
false
has_roles
false
is_editable
true
is_deleteable
true
user_id
1
--}}