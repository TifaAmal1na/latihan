<x-guest-layout>
    <!-- Session Status -->
   <x-auth-session-status class="mb-4" :status="session('status')" />

   <form method="POST" action="{{ route('login') }}">
       @csrf

       <!-- Email Address -->
       <div>
           <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
           <x-text-input id="email" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-indigo-400 focus:ring-indigo-400 rounded-lg px-3 py-2" 
                         type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
           <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
       </div>

       <!-- Password -->
       <div class="mt-4">
           <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
           <x-text-input id="password" class="block mt-1 w-full bg-gray-700 text-white border-gray-600 focus:border-indigo-400 focus:ring-indigo-400 rounded-lg px-3 py-2"
                         type="password" name="password" required autocomplete="current-password" />
           <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
       </div>

       <!-- Remember Me -->
       <div class="flex items-center justify-between mt-4">
           <label for="remember_me" class="flex items-center text-gray-300">
               <input id="remember_me" type="checkbox" class="rounded border-gray-500 text-indigo-600 focus:ring-indigo-400" name="remember">
               <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
           </label>
           @if (Route::has('password.request'))
               <a class="text-sm text-indigo-400 hover:text-indigo-300" href="{{ route('password.request') }}">
                   {{ __('Forgot password?') }}
               </a>
           @endif
       </div>

       <!-- Button Login -->
       <div class="mt-6">
           <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-2 rounded-lg shadow-md transition duration-200">
               {{ __('Log in') }}
           </button>
       </div>

       <!-- Link Register -->
       <div class="mt-4 text-center">
           <p class="text-gray-400 text-sm">Belum punya akun?
               <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-semibold">
                   Daftar di sini
               </a>
           </p>
       </div>
   </form>
</div>
</div>
</x-guest-layout>