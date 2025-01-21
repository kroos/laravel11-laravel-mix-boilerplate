@extends('layouts.app')

@section('content')
<div class="col-sm-12 d-flex flex-column align-items-center justify-content-center">
	<h3>Sign In</h3>
	<form method="POST" action="{{ route('login') }}" id="form" class=" needs-validation">
	@csrf

		<div class="form-group row m-2 @error('username') has-error @enderror">
			<label for="username" class="col-sm-4 col-form-label col-form-label-sm">Username : </label>
			<div class="col-sm-8">
				<input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Username">
				@error('username') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>
		</div>

		<div class="form-group row m-2 @error('password') has-error @enderror">
			<label for="password" class="col-sm-4 col-form-label col-form-label-sm">Password : </label>
			<div class="col-sm-8">
				<input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control form-control-sm @error('username') is-invalid @enderror" placeholder="Password">
				@error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
			</div>
		</div>

		<!-- Remember Me -->
			<div class="form-check col-sm-5 m-4">
				<input name="remember" class="form-check-input rounded" type="checkbox" value="" id="remember_me">
				<label class="form-check-label" for="remember_me">
					Remember me
				</label>
			</div>


		<div class="col-sm-12 justify-content-end m-4">
			@if (Route::has('password.request'))
				<a class="" href="{{ route('password.request') }}">
					{{ __('Forgot your password?') }}
				</a>
			@endif

			<button type="submit" class="btn btn-sm btn-primary m-3">
				{{ __('Log in') }}
			</button>
		</div>

	</form>
</div>
@endsection

@section('js')
@endsection
