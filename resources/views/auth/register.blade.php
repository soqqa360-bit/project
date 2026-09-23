<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-3">
            <label for="avatar" class="form-label">Profile Rasm (Majburiy Emas)</label>
            <div x-data="{ preview: null }">
                <div x-show="preview">
                    <img :src="preview" class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;"
                        alt="">
                </div>

                <input type="file" id="avatar" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                <div id="previewDiv" style="display: none;">
                    <img id="previewImage" src="" alt="" style="max-width: 300px; margin-top: 10px;">
                </div>
                @error (session('avatar'))
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <small>
                    JPG,PNG,WEBP,JPEG: MAX 2MB
                </small>
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="form-label">Email</label>
            <input type="text" id="email" class="form-control" name="email" value="{{ old('email') }}">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="form-label">Password</label>

            <input type="password" class="form-control" id="password" name="password">

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="form-label">Confirm Password</label>

            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <div class="card bg-light p-3 border rounded shadow-sm d-flex align-items-center justify-content-center">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display(['data-size' => 'normal']) !!}
            </div>
            @error('g-recaptcha-response')
                <p class="lead text-danger">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        const imageDiv = document.getElementById('previewDiv')
        const imagePreview = document.getElementById('previewImage')
        const fileInput = document.getElementById('avatar')

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0]

            if(file) {
                imageDiv.style.display = 'block',
                imagePreview.src = URL.createObjectURL(file)
            }
        })
        
    </script>
</x-guest-layout>