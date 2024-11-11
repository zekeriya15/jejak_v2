{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



<x-guest-layout>
    <div class="wrapper">
        <div class="form-box">
            <h2>Buat akun <span style="color: #2dae5b;">JE</span><span style="color: #ffc120;">JAK</span></h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="input-box">
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus
                        autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    <label for="name">Nama Lengkap</label>
                </div>

                <!-- Email Address -->
                <div class="mt-4 input-box">
                    <input id="email" type="email" name="email" :value="old('email')" required
                        autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <label for="email">Email</label>
                </div>

                <!-- Password -->
                <div class="mt-4 input-box">
                    <input id="password" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <label for="password">Kata Sandi</label>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4 input-box">
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    <label for="password_confirmation">Konfırması Kata Sandi</label>
                </div>

                <button type="submit" class="btn">Daftar</button>

                <div class="login-register">
                    <p>Sudah punya akun? 
                        <a href="{{ route('login') }}">Masuk</a>
                    </p>
                </div>  
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
