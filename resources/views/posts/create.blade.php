@extends('backend/dashboard/layouts/app')


@section('breadcrumb')
   <a href="{{ route('home') }}">@lang('backend.breadcrumbs_dashboard')</a> / <a href="{{ route('posts.index') }}">@lang('posts.header_browse')</a> / @lang('posts.header_create')
@endsection


@section('content')
<style>
.cke_editable {
	padding: 1rem;
}
</style>
<div class="card">
	<div class="card-header"><h3 class="float-start">@lang('posts.header_create')</h3><div class="float-end"></div></div>
	<form method="POST" action="{{ route('posts.store') }}">
	@csrf
	<div class="card-body">
		<div class="form-floating mb-1">
		  <input type="text" class="form-control" id="ititle" name="title" value="{{ old('title') ?? '' }}" placeholder="@lang('posts.placeholder_title')">
		  <label for="ititle">@lang('posts.datafield_title')</label>
		  <div class="invalid-feedback"></div>
		</div>

		<div class="form-floating mb-1">
		  <input type="text" class="form-control" id="ishort" name="short" value="{{ old('short') ?? '' }}" placeholder="@lang('posts.placeholder_short')">
		  <label for="ishort">@lang('posts.datafield_short')</label>
		  <div class="invalid-feedback"></div>
		</div>

		<div class="form-floating1 mb-1">
		   <label for="ibody">@lang('posts.datafield_body')</label>
		   <textarea class="form-control hr-18" id="ibody" name="body" rows="9" placeholder="@lang('posts.placeholder_body')">{!! old('body') ?? __('posts.placeholder_body') !!}</textarea>

		  <div class="invalid-feedback"></div>
		</div>
		<div class="row">
		<div class="col">
		<div class="form-floating">
		  <select class="form-select" id="ilanguage" aria-label="Floating label select example">
			@foreach(getLanguagesList() as $iso2=>$title)
			<option value="{{ $iso2 }}" @if( $iso2=='en' ) SELECTED @endif>{{ substr($title,0, strlen($title) -3) }}</option>
			@endforeach
		  </select>
		  <label for="floatingSelect">Works with selects</label>
		</div>
		</div>
		<div class="col">
			<div class="form-check form-switch">
			  <input class="form-check-input" type="checkbox" role="switch" checked name="is_published" id="iis_published">
			  <label class="form-check-label" for="iis_published">@lang('posts.datafield_is_published')</label>
			</div>

			<div class="form-check form-switch">
			  <input class="form-check-input" type="checkbox" role="switch" name="is_featured" id="iis_featured">
			  <label class="form-check-label" for="iis_featured">@lang('posts.datafield_is_featured')</label>
			</div>
			<div class="form-check form-switch">
			  <input class="form-check-input" type="checkbox" role="switch" name="is_pinned" id="iis_pinned">
			  <label class="form-check-label" for="iis_pinned">@lang('posts.datafield_is_pinned')</label>
			</div>
			<div class="form-check form-switch">
			  <input class="form-check-input" type="checkbox" role="switch" name="is_commentable" id="iis_commentable">
			  <label class="form-check-label" for="iis_commentable">@lang('posts.datafield_is_commentable')</label>
			</div>
			<div class="form-check form-switch">
			  <input class="form-check-input" type="checkbox" role="switch" name="has_roles" id="ihas_roles">
			  <label class="form-check-label" for="ihas_roles">@lang('posts.datafield_has_roles')</label>
			</div>
			<div class="form-check form-switch">
			  <input class="form-check-input" type="checkbox" role="switch" checked name="is_editable" id="iis_editable">
			  <label class="form-check-label" for="iis_editable">@lang('posts.datafield_is_editable')</label>
			</div>
			<div class="form-check form-switch">
			  <input class="form-check-input" type="checkbox" role="switch" checked name="is_deleteable" id="iis_deleteable">
			  <label class="form-check-label" for="iis_deleteable">@lang('posts.datafield_is_deleteable')</label>
			</div>
		</div>
	  </div>

	</div>
	<div class="card-footer text-end">
		<button class="btn btn-primary" type="submit">@lang('index.action_save')</button>
		<a href="{{ route('posts.index') }}" class="btn btn-secondary">@lang('index.action_cancel')</a>
	</div>
	</form>
</div>

@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.20.0/standard-all/ckeditor.js"></script>


<script>
    CKEDITOR.replace('ibody', {
      removeButtons: 'PasteFromWord'
    });
</script>
@endsection