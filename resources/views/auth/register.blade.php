<!DOCTYPE html>
<html lang="en">
{{-- Head --}}
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>{{config("app.name")}} | registration</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  body{
    margin: 0;
    height: 100%;
  }
</style>
<body>

<div class="flex w-full h-screen overflow-hidden adaptable:p-4">

<div class="flex w-1/2 h-screen adaptable:w-full adaptable:h-auto adaptable:block p-2 items-center justify-center overflow-y-scroll">
    <div class="max-w-md w-full space-y-8">
      <div class="pt-24 adaptable:pt-2">
        <h2 class=" text-center text-3xl font-extrabold text-gray-800">
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
             <div class="p-1 border border-red-500 rounded-b-sm text-base font-semibold text-red-500 text-center overflow-hidden" role="alert">
                  <strong>{{ $message }}!</strong>
             </div>
             @enderror
          </div>

          <div class="mt-4">
            <input id="email" name="email" type="email" autocomplete="email" required class=" @error('email') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="Email">
             @error('email')
             <div class="p-1 border border-red-500 rounded-b-sm text-base font-semibold text-red-500 text-center overflow-hidden" role="alert">
              <strong>{{ $message }}!</strong>
             </div>
             @enderror
          </div>

          <div class="mt-4">
            <input id="address" name="address" type="text" autocomplete="address" required class=" @error('address') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="address">
             @error('address')
             <div class="p-1 border border-red-500 rounded-b-sm text-base font-semibold text-red-500 text-center overflow-hidden" role="alert">
              <strong>{{ $message }}!</strong>
             </div>
             @enderror
          </div>

          <div class="mt-4">
            <input id="city" name="city" type="text" autocomplete="city" required class=" @error('city') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="City">
             @error('city')
             <div class="p-1 border border-red-500 rounded-b-sm text-base font-semibold text-red-500 text-center overflow-hidden" role="alert">
              <strong>{{ $message }}!</strong>
             </div>
             @enderror
          </div>

          <div class="mt-4">
            <input id="phone" name="phone" type="text" autocomplete="phone" required class=" @error('phone') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="Phone">
             @error('phone')
             <div class="p-1 border border-red-500 rounded-b-sm text-base font-semibold text-red-500 text-center overflow-hidden" role="alert">
              <strong>{{ $message }}!</strong>
             </div>
             @enderror
          </div>

          <div class="mt-4 block">
            <label class="text-gray-800 text-base font-semibold pl-0.5" for="birthdate">Birthdate</label>
            <input id="birthdate" name="birthdate" type="date" autocomplete="birthdate" required class=" @error('birthdate') is-invalid @enderror
            mt-1 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="DD/MM/YYYY">
             @error('birthdate')
             <div class="p-1 border border-red-500 rounded-b-sm text-base font-semibold text-red-500 text-center overflow-hidden" role="alert">
              <strong>{{ $message }}!</strong>
             </div>
             @enderror
          </div>

          <div class="mt-4">
            <input id="password" type="password" class="@error('password') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" name="password" required autocomplete="new-password" placeholder="Password">
             @error('password')
             <div class="p-1 border border-red-500 rounded-b-sm text-base font-semibold text-red-500 text-center overflow-hidden" role="alert">
              <strong>{{ $message }}!</strong>
             </div>
             @enderror
          </div>

          <div class="mt-4">
            <input id="password-confirm" type="password" class="@error('password-confirm') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none
             focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" name="password_confirmation" required autocomplete="new-password" placeholder="Password confirm">
             @error('password-confirm')
             <div class="p-1 border border-red-500 rounded-b-sm text-base font-semibold text-red-500 text-center overflow-hidden" role="alert">
              <strong>{{ $message }}!</strong>
             </div>
             @enderror
          </div>
          
        </div>
  
        
        <div class="flex items-center justify-between">

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
