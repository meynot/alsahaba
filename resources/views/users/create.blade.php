@extends('backend/dashboard/layouts/app')


@section('breadcrumb')
   <a href="{{ route('home') }}">@lang('backend.breadcrumbs_dashboard')</a> / <a href="{{ route('users.index') }}">@lang('users.header_browse')</a> / @lang('users.header_create')
@endsection


@section('content')
<div class="card">
	<div class="card-header"><h3 class="float-start">@lang('users.header_create')</h3><div class="float-end"></div></div>
	<form method="POST" action="{{ route('users.store') }}">
	@csrf
	<div class="card-body">
		<div class="form-floating mb-1">
		  <input type="text" class="form-control @error('name') is-invalid @enderror" id="iname" name="name" value="{{ old('name') ?? '' }}" placeholder="@lang('users.placeholder_name')">
		  <label for="iname">@lang('users.datafield_name')</label>
			@error('name')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror		  
		</div>
		<div class="row">
		 <div class="col">
		  <div class="form-floating mb-1">
		   <input type="password" class="form-control @error('password') is-invalid @enderror" id="ipassword" name="password" value="{{ old('password') ?? '' }}" placeholder="@lang('users.placeholder_password')">
		   <label for="ipassword">@lang('users.datafield_password')</label>
			@error('password')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror		  
		  </div>
		 </div>
		 <div class="col">
		  <div class="form-floating mb-1">
		   <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="ipassword_confirmation" name="password_confirmation" value="{{ old('password_confirmation') ?? '' }}" placeholder="@lang('users.placeholder_password_confirmation')">
		   <label for="ipassword_confirmation">@lang('users.datafield_password_confirmation')</label>
			@error('password_confirmation')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror		  
		  </div>
		 </div>
		</div>

		<div class="form-floating mb-1">
		  <input type="text" class="form-control @error('email') is-invalid @enderror" id="iemail" name="email" value="{{ old('email') ?? '' }}" placeholder="@lang('users.placeholder_email')">
		  <label for="iemail">@lang('users.datafield_email')</label>
			@error('email')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror		  
		</div>

		<div class="form-floating mb-1">
		  <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="ifacebook" name="facebook" value="{{ old('facebook') ?? '' }}" placeholder="@lang('users.placeholder_facebook')">
		  <label for="ifacebook">@lang('users.datafield_facebook')</label>
			@error('facebook')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror		  
		</div>

		<div class="form-floating mb-1">
		  <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="itwitter" name="twitter" value="{{ old('twitter') ?? '' }}" placeholder="@lang('users.placeholder_twitter')">
		  <label for="itwitter">@lang('users.datafield_twitter')</label>
			@error('twitter')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror		  
		</div>

		<div class="form-floating mb-1">
		  <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="iinstagram" name="instagram" value="{{ old('instagram') ?? '' }}" placeholder="@lang('users.placeholder_instagram')">
		  <label for="iinstagram">@lang('users.datafield_instagram')</label>
			@error('instagram')
				<div class="invalid-feedback">{{ $message }}</div>
			@enderror		  
		</div>

		<div class="row">
		 <div class="col">
		  <div class="form-floating">
		   <select class="form-select @error('language') is-invalid @enderror" name="roles" id="ilanguage" aria-label="Floating label select example">
			@foreach(getLanguagesList() as $iso2=>$title)
			<option value="{{ $iso2 }}" @if( $iso2=='en' ) SELECTED @endif>{{ substr($title,0, strlen($title) -3) }}</option>
			@endforeach
		   </select>
		   <label for="floatingSelect">@lang('users.datafield_language')</label>
		  </div>
		 </div>
		 
		<div class="col">
		  <div class="form-floating">
		   <select class="form-select @error('roles') is-invalid @enderror" id="iroles" aria-label="Floating label select example">
			@foreach($roles as $role)
			<option value="{{ $role->id }}">{{ $role->name }}</option>
			@endforeach
		   </select>
		   <label for="floatingSelect">@lang('users.datafield_roles')</label>
		</div>
	  </div>
	 <div class="form-check form-switch">
	  <input class="form-check-input" type="checkbox" role="switch" checked name="is_active" id="iis_active">
	  <label class="form-check-label" for="iis_active">@lang('users.datafield_is_active')</label>
	 </div>

	</div>
	<div class="card-footer text-end">
		<button class="btn btn-primary" type="submit">@lang('index.action_save')</button>
		<a href="{{ route('users.index') }}" class="btn btn-secondary">@lang('index.action_cancel')</a>
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