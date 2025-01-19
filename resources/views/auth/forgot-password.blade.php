@extends('layouts.app')

@section('content')
<div class="col-sm-12 d-flex flex-column align-items-center justify-content-center">
	<h3>Forgot your password? No problem. Just let us know your username and we will email you a password reset link that will allow you to choose a new one.</h3>
	<form method="POST" action="{{ route('password.email') }}" id="form" class="needs-validation">
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

		<div class="text-center m-0">
			<button type="submit" class="btn btn-sm btn-primary m-3">
				{{ __('Password Reset Link') }}
			</button>
		</div>
	</form>
</div>
@endsection

@section('js')
@endsection
