<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>{{config("app.name")}} | login</title>

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

<div class="flex w-full h-full adaptable:block
adaptable:max-w-xl adaptable:mx-auto adaptable:p-4
adaptable:pl-12 adaptable:mt-8 adaptable:h-auto
mobile:pl-4">
  <div class="flex w-1/2 h-screen adaptable:w-full adaptable:block min-h-full items-center justify-center sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-800">
          Login to account
        </h2>
      </div>
      <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">Email address</label>
            <input id="email-address" name="email" type="email" autocomplete="email" required class="@error('email') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="Email address">
            @error('email')
            <div class="p-1 border border-red-500 rounded-b-sm text-base font-semibold text-red-500 text-center overflow-hidden" role="alert">
                 <strong>{{ $message }}!</strong>
            </div>
            @enderror
          </div>
          <div class="pt-4">
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password" autocomplete="current-password" required class="@error('password') is-invalid @enderror
            appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm" placeholder="Password">
            @error('password')
            <div class="p-1 border border-red-500 rounded-b-sm text-base font-semibold text-red-500 text-center overflow-hidden" role="alert">
                 <strong>{{ $message }}!</strong>
            </div>
            @enderror
          </div>
        </div>
  
  
        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-800 shadow-2xl hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            Sign in
          </button>
        </div>
      </form>

      <div class="flex text-sm">
        <a href="{{route('password.request')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
          Forgot your password?
        </a>
        <a href="{{route('register')}}" class="font-medium text-indigo-600 hover:text-indigo-500 ml-32">
          Do not have an account?
        </a>
      </div>


    </div> 

    </div>

    <div class="flex w-1/2 h-screen adaptable:hidden  overflow-hidden">
        <img src="{{ asset('images/login-image.png') }}" width="100%" height="100%">
    </div>

  </div>


</body>
</html>

