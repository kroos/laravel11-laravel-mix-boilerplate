@extends('layouts.app')

@section('content')
<div class="col-sm-12 d-flex flex-column align-items-center justify-content-center">
	<h3>Sign Up</h3>
	<form method="POST" action="{{ route('register') }}" id="form" class="needs-validation">
		@csrf

		<div class="form-group row m-2 {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name" class="col-sm-4 col-form-label col-form-label-sm">Name : </label>
			<div class="col-sm-8 {{ ($errors->has('name'))?'is-invalid':NULL }}">
				<input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control form-control-sm {{ ($errors->has('name'))?'is-invalid':NULL }}" placeholder="Name">
				<div class="invalid-feedback text-start text-danger fw-lighter">
					@if ($errors->has('name'))
						@foreach ($errors->get('name') as $error)
							<span class="">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
		</div>

		<div class="form-group row m-2 {{ $errors->has('email') ? 'has-error' : '' }}">
			<label for="email" class="col-sm-4 col-form-label col-form-label-sm">Email : </label>
			<div class="col-sm-8 {{ ($errors->has('email'))?'is-invalid':NULL }}">
				<input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control form-control-sm {{ ($errors->has('email'))?'is-invalid':NULL }}" placeholder="Email">
				<div class="invalid-feedback text-start text-danger fw-lighter">
					@if ($errors->has('email'))
						@foreach ($errors->get('email') as $error)
							<span class="">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
		</div>

		<div class="form-group row m-2 {{ $errors->has('username') ? 'has-error' : '' }}">
			<label for="username" class="col-sm-4 col-form-label col-form-label-sm">Username : </label>
			<div class="col-sm-8 {{ ($errors->has('username'))?'is-invalid':NULL }}">
				<input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control form-control-sm {{ ($errors->has('username'))?'is-invalid':NULL }}" placeholder="Username">
				<div class="invalid-feedback text-start text-danger fw-lighter">
					@if ($errors->has('username'))
						@foreach ($errors->get('username') as $error)
							<span class="">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
		</div>

		<div class="form-group row m-2 {{ $errors->has('password') ? 'has-error' : '' }}">
			<label for="password" class="col-sm-4 col-form-label col-form-label-sm">Password : </label>
			<div class="col-sm-8 {{ ($errors->has('password'))?'is-invalid':NULL }}">
				<input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control form-control-sm {{ ($errors->has('password'))?'is-invalid':NULL }}" placeholder="Password">
				<div class="invalid-feedback text-start text-danger fw-lighter">
					@if ($errors->has('password'))
						@foreach ($errors->get('password') as $error)
							<span class="">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
		</div>

		<div class="form-group row m-2 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
			<label for="password_confirmation" class="col-sm-4 col-form-label col-form-label-sm">Password Confirmation : </label>
			<div class="col-sm-8 {{ ($errors->has('password_confirmation'))?'is-invalid':NULL }}">
				<input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control form-control-sm {{ ($errors->has('password_confirmation'))?'is-invalid':NULL }}" placeholder="Password Confirmation">
				<div class="invalid-feedback text-start text-danger fw-lighter">
					@if ($errors->has('password_confirmation'))
						@foreach ($errors->get('password_confirmation') as $error)
							<span class="">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
		</div>

		<div class="col-sm-12 justify-self-end m-4">
			<a class="" href="{{ route('login') }}">
				{{ __('Already registered?') }}
			</a>

			<button type="submit" class="btn btn-sm btn-primary m-3">
				{{ __('Register') }}
			</button>
		</div>
	</form>
</div>
@endsection

@section('js')
@endsection
