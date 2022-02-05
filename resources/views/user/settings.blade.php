<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{config("app.name")}} @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/layouts/script.js')}}" defer></script>
    <script src="{{ asset('js/search.js') }}" defer></script>
    <script src="{{ asset('js/admin/panel.js') }}" defer></script> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  body{
    height: 100%;
  }
</style>
<body>
    
    @include('layouts.navbar')

    <div class="w-full h-screen absolute flex adaptable:block adaptable:space-x-0 space-x-2 overflow-hidden 
    adaptable:overflow-auto pt-24 adaptable:pt-36">

      {{-- Navbar --}}
      @include('user.layouts.sidebar')

      {{-- Container --}}
      <div class="w-full overflow-y-scroll">

        @if(Request::url() == route('profile'))
           @include('user.profile')
        @endif

        @if(Request::url() == route('order'))
           @include('user.order')
        @endif

        @if(Request::url() == route('cards'))
           @include('user.addcart')
        @endif

        
      </div>
    
    </div>
  
    
</body>
</html>