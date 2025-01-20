<section>
	<header>
		<h2>
			{{ __('Update Password') }}
		</h2>

		<p>
			{{ __('Ensure your account is using a long, random password to stay secure.') }}
		</p>
	</header>

	<form method="post" action="{{ route('password.update') }}">
		@csrf
		@method('put')

		<div class="form-group row m-2 {{ $errors->has('current_password') ? 'has-error' : '' }}">
			<label for="current_password" class="col-sm-4 col-form-label col-form-label-sm">Current Password : </label>
			<div class="col-sm-8 {{ ($errors->has('current_password'))?'is-invalid':NULL }}">
				<input type="current_password" name="current_password" id="current_password" value="{{ old('current_password') }}" class="form-control form-control-sm {{ ($errors->has('current_password'))?'is-invalid':NULL }}" placeholder="Current Password">
				<div class="invalid-feedback text-start text-danger fw-lighter">
					@if ($errors->has('current_password'))
						@foreach ($errors->get('current_password') as $error)
							<span class="">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
		</div>

		<div class="form-group row m-2 {{ $errors->has('password') ? 'has-error' : '' }}">
			<label for="password" class="col-sm-4 col-form-label col-form-label-sm">New Password : </label>
			<div class="col-sm-8 {{ ($errors->has('password'))?'is-invalid':NULL }}">
				<input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control form-control-sm {{ ($errors->has('password'))?'is-invalid':NULL }}" placeholder="New Password">
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
			<label for="password_confirmation" class="col-sm-4 col-form-label col-form-label-sm">Confirm Password : </label>
			<div class="col-sm-8 {{ ($errors->has('password_confirmation'))?'is-invalid':NULL }}">
				<input type="password" name="password_confirmation" id="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control form-control-sm {{ ($errors->has('password_confirmation'))?'is-invalid':NULL }}" placeholder="Confirm Password">
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
			<button type="submit" class="btn btn-sm btn-primary m-3">
				{{ __('Save') }}
			</button>
			@if (session('status') === 'password-updated')
				<p
					x-data="{ show: true }"
					x-show="show"
					x-transition
					x-init="setTimeout(() => show = false, 2000)"
					class="text-sm text-gray-600"
				>{{ __('Saved.') }}</p>
			@endif
		</div>

	</form>
</section>
