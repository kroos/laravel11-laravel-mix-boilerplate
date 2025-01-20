@extends('layouts.app')

@section('content')
<div class="col-sm-6 mx-auto align-items-center justify-content-center">
	<h3>This is a secure area of the application. Please confirm your password before continuing.</h3>
	<form method="POST" action="{{ route('password.confirm') }}" id="form" class="needs-validation">
		@csrf

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

		<div class="text-center m-0">
			<button type="submit" class="btn btn-sm btn-primary m-3">
				{{ __('Confirm') }}
			</button>
		</div>
	</form>
</div>
@endsection

@section('js')
@endsection
