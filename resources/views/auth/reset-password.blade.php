@extends('layouts.app')

@section('content')
<div class="col-sm-12 d-flex flex-column align-items-center justify-content-center">
	<h3></h3>

	<form method="POST" action="{{ route('password.store') }}" id="form" class="needs-validation">
		@csrf

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

		<div class="text-center m-0">
			<button type="submit" class="btn btn-sm btn-primary m-3">
				{{ __('Reset Password') }}
			</button>
		</div>

	</form>
</div>
@endsection

@section('js')
@endsection
