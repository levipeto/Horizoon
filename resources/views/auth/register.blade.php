<!DOCTYPE html>
<html lang="en">
{{-- Head --}}
@include('layouts.head')
<body>

<div class="flex w-full h-full overflow-hidden">

<div class="flex w-1/2 h-screen adaptable:w-full adaptable:block min-h-full p-2 items-center justify-center overflow-y-scroll">
    <div class="max-w-md w-full space-y-8">
      <div>
        <h2 class="mt-2 text-center text-3xl font-extrabold text-gray-800">
          Create new account
        </h2>
      </div>
      <form class="space-y-7" action="{{ route('register') }}" method="POST">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm-space-y-px">

          <div class="mt-4">
            <input id="fullname" name="fullname" type="text" autocomplete="fullname" required class=" @error('fullname') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="Full name">
             @error('fullname')
             <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
             </span>
             @enderror
          </div>

          <div class="mt-4">
            <input id="email" name="email" type="email" autocomplete="email" required class=" @error('email') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="Email">
             @error('email')
             <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
             </span>
             @enderror
          </div>

          <div class="mt-4">
            <input id="address" name="address" type="text" autocomplete="address" required class=" @error('address') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="address">
             @error('address')
             <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
             </span>
             @enderror
          </div>

          <div class="mt-4">
            <input id="city" name="city" type="text" autocomplete="city" required class=" @error('city') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="City">
             @error('city')
             <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
             </span>
             @enderror
          </div>

          <div class="mt-4">
            <input id="phone" name="phone" type="text" autocomplete="phone" required class=" @error('phone') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="Phone">
             @error('phone')
             <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
             </span>
             @enderror
          </div>

          <div class="mt-4">
            <input id="birthdate" name="birthdate" type="date" autocomplete="birthdate" required class=" @error('birthdate') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="Birth date">
             @error('birthdate')
             <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
             </span>
             @enderror
          </div>

          <div class="mt-4">
            <input id="password" type="password" class="@error('password') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" name="password" required autocomplete="new-password" placeholder="Password">
             @error('password')
             <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
             </span>
             @enderror
          </div>

          <div class="mt-4">
            <input id="password-confirm" type="password" class="@error('password-confirm') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" name="password_confirmation" required autocomplete="new-password" placeholder="Password confirm">
             @error('password-confirm')
             <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
             </span>
             @enderror
          </div>
          
        </div>
  
        
        <div class="flex items-center justify-between">
          <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-300 rounded" required autocomplete="new-password">
                <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                  Remember me
                </label>
          </div>

          <div class="flex text-sm">
            <a href="{{route('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
              Do you already have an account?
            </a>
          </div>
       
        </div>

        <div class="mt-4 flex text-sm">
          <div class="font-medium text-gray-800 text-base">
            By signing up for an account, you agree to our <a class="text-indigo-600 hover:text-indigo-500" href="">Terms of Use. 
            </a> Please make our <a class="text-indigo-600 hover:text-indigo-500" href="">Privacy Policy.</a>
          </div>
        </div>

  
        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-800 shadow-2xl hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            Register
          </button>
        </div>
        
      </form>
    </div>
  </div>

  <div class="flex  w-1/2 h-screen adaptable:hidden  overflow-hidden">
    <img src="{{ asset('images/login-image.png') }}" width="100%" height="100%">
  </div>

</div>
  
</body>
</html>
