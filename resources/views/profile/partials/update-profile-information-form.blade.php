<section>
	<header>
		<h2 >
			{{ __('Profile Information') }}
		</h2>

		<p>
			{{ __("Update your account's profile information and email address.") }}
		</p>
	</header>

	<form id="send-verification" method="post" action="{{ route('verification.send') }}">
		@csrf
	</form>

	<form method="post" action="{{ route('profile.update') }}" >
		@csrf
		@method('patch')

		<div class="form-group row m-2 {{ $errors->has('name') ? 'has-error' : '' }}">
			<label for="name" class="col-sm-4 col-form-label col-form-label-sm">Name : </label>
			<div class="col-sm-8 {{ ($errors->has('name'))?'is-invalid':NULL }}">
				<input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control form-control-sm {{ ($errors->has('name'))?'is-invalid':NULL }}" placeholder="Name">
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
				<input type="text" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control form-control-sm {{ ($errors->has('email'))?'is-invalid':NULL }}" placeholder="Email">
				<div class="invalid-feedback text-start text-danger fw-lighter">
					@if ($errors->has('email'))
						@foreach ($errors->get('email') as $error)
							<span class="">{{ $error }}</span>
						@endforeach
					@endif
				</div>
			</div>
			@if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
				<div>
					<p class="text-sm mt-2 text-gray-800">
						{{ __('Your email address is unverified.') }}

						<button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
							{{ __('Click here to re-send the verification email.') }}
						</button>
					</p>

					@if (session('status') === 'verification-link-sent')
						<p class="mt-2 font-medium text-sm text-green-600">
							{{ __('A new verification link has been sent to your email address.') }}
						</p>
					@endif
				</div>
			@endif
		</div>

		<div class="col-sm-12 justify-self-end m-4">
			<button type="submit" class="btn btn-sm btn-primary m-3">
				{{ __('Save') }}
			</button>
			@if (session('status') === 'profile-updated')
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
