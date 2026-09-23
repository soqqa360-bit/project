<section>
    <header>
        <h2 class="text-muted text-lg font-medium">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-muted">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form class="mt-4" id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="image" class="form-label">Image (FILE)</label>
            <input type="file" class="form-control @error('avatar') is-invalid
            @enderror" name="avatar">
            @error('avatar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        @if (auth()->user()->avatar)
            <img class="rounded-circle mb-3" style="width: 100px; height: 100px;"
                src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="">
        @else
            <p
                style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(45deg, #fada61 0.000%, #ff9188 50.000%, #ff5acd 100.000%); display: flex; align-items: center; justify-content: center; font-size: 60px; color: white;">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</p>
        @endif

        <div class="mb-3">
            <label for="gender" class="form-label d-block">Gender</label>
            <div class="form-check form-check-inline">
                <input name="gender" type="radio" id="gender_male" {{ old('gender', $user->gender) === 'male' ? 'checked' : '' }} value="male" class="form-check-input">
                <label for="gender_male" class="form-check-label">Male</label>
            </div>

            <div class="form-check form-check-inline">
                <input name="gender" type="radio" id="gender_female" {{ old('gender', $user->gender) === 'female' ? 'checked' : '' }} value="female" class="form-check-input">
                <label for="gender_female" class="form-check-label">Female</label>
            </div>

            <div class="form-check form-check-inline">
                <input name="gender" type="radio" id="gender_other" {{ old('gender', $user->gender) === 'other' ? 'checked' : '' }} value="other" class="form-check-input">
                <label for="gender_other" class="form-check-label">Other</label>
            </div>

            @error('gender')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <div class="mb-3">
                <span>Ro'yhatdan o'tgan: {{ $user->created_at ? $user->created_at->diffForHumans() : 'Hali Kirilmagan' }}</span>
            </div>
            <div class="mb-3">
                <span>Oxirgi faolik: {{ $user->last_seen_at ? $user->last_seen_at->diffForHumans() : 'Hali Kirilmagan' }}</span>
            </div>
        </div>

        <div class="mb-3">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="date" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}"
                class="form-control @error('birth_date') is-invalid @enderror">
            @error('birth_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email', $user->email) }}" required autocomplete="email">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-muted">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="btn btn-link p-0 m-0 align-baseline">
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

        <div class="d-flex align-items-center gap-4">
            <button class="btn btn-success">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-success m-0">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>