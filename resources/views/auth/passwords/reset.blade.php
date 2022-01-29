<!DOCTYPE html>
<html lang="en">
<head>
   @extends('layouts.head')
   @section('title','Send reset email')
</head>
<body>

   
<div class="flex w-full h-full adaptable:block
adaptable:max-w-xl adaptable:mx-auto 
adaptable:pl-12 adaptable:mt-12 adaptable:h-auto
mobile:pl-4">
  <div class="flex w-1/2 h-screen adaptable:w-full adaptable:block min-h-full items-center justify-center sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <div class="mt-6 block text-center text-3xl font-extrabold text-gray-800">
            The last step
            <div class="mt-2 text-xl">
                Add your new password
            </div>
        </div>
      </div>
      @if (session('status'))
      <div class="alert alert-success" role="alert">
          {{ session('status') }}
      </div>
      @endif
      <form method="POST" action="{{route('password.update')}}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}"> 

        <div class="mt-4">
            <input id="email" type="email" class=" @error('email') is-invalid @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 
            text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm
            " name="email" value="{{ request()->get('email') }}" required autocomplete="email" autofocus placeholder="Your email...">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mt-4">
            <input id="password" type="password" class=" @error('password') is-invalid @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 
            text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm
            " name="password"  required autocomplete="new-password" autofocus placeholder="Your password...">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mt-4">
            <input id="password-confirm" type="password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 
            text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-800 focus:border-indigo-800 focus:z-10 sm:text-sm
            " name="password_confirmation"  required autocomplete="new-password" autofocus placeholder="Repeat password...">
        </div>

        <div class="mt-4">
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-800 shadow-2xl hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
              <svg class="h-5 w-5 text-gray-500 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
              </svg>
            </span>
            Send
          </button>
        </div>

      </form>
    </div> 
    </div>
    <div class="flex w-1/2 h-screen adaptable:hidden  overflow-hidden">
        <img src="{{ asset('images/login-image.png') }}" width="100%" height="100%">
    </div>
</div>

    
</body>
</html>

{{-- 
@include('layouts.head')
<div class="container max-w-5xl mobile:max-w-2xl mx-auto mt-24">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>


                <div>
                    <form method="POST" action="{{route('password.update')}}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}"> 

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="border border-gray-300 @error('email') is-invalid @enderror" name="email" value="{{ request()->get('email')}}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="border border-gray-300  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="border border-gray-300" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="bg-blue-500 rounded-sm text-white font-semibold text-xl p-2">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
