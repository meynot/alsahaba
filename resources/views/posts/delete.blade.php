@extends('backend/dashboard/layouts/app')


@section('breadcrumb')
   <a href="{{ route('home') }}">@lang('backend.breadcrumbs_dashboard')</a> / <a href="{{ route('posts.index') }}">@lang('posts.header_browse')</a> / @lang('posts.header_delete')
@endsection


@section('content')

<div class="card text-bg-warning">
	<div class="card-header"><h3 class="float-start">@lang('posts.header_delete')</h3><div class="float-end"></div></div>
	<div class="card-body">
	  <div class="border p-1 mb-1">
	   <div class="bg-darker-100 p-1">@lang('posts.datafield_title')</div>
	   <div>{{ $post->title }}</div>
	  </div>
	  <div class="border p-1 mb-1">
	   <div class="bg-darker-100 p-1">@lang('posts.datafield_short')</div>
	   <div>{!! $post->short !!}</div>
	  </div>
	  <div class="border p-1 mb-1">
	   <div class="bg-darker-100 p-1">@lang('posts.datafield_body')</div>
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
	  <div class="float-start fw-bold">@lang('posts.warn_delete')</div>
	  <div class="float-end">
	  <form method="post" action="{{ route('posts.destroy', $post->id) }}">
		@csrf @method('delete')
		<button class="btn btn-danger" type="submit">@lang('index.action_delete')</button>
		<a href="{{ route('posts.index') }}" class="btn btn-secondary">@lang('index.action_cancel')</a>
	  </form>
	  </div>
	</div>
</div>
@endsection
