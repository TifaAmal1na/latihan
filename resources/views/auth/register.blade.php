<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-gray-300" />
            <x-text-input id="name" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-indigo-400 focus:ring-indigo-400 rounded-lg px-3 py-2" 
                          type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-indigo-400 focus:ring-indigo-400 rounded-lg px-3 py-2" 
                          type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
            <x-text-input id="password" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-indigo-400 focus:ring-indigo-400 rounded-lg px-3 py-2" 
                          type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-300" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-indigo-400 focus:ring-indigo-400 rounded-lg px-3 py-2" 
                          type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
        </div>

        <!-- Button Register -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-2 rounded-lg shadow-md transition duration-200">
                {{ __('Register') }}
            </button>
        </div>

        <!-- Link to Login -->
        <div class="mt-4 text-center">
            <p class="text-gray-400 text-sm">Sudah punya akun?
                <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold">
                    Masuk di sini
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
