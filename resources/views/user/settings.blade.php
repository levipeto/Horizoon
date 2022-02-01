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
      <div class="w-1/4 adaptable:w-full p-2 overflow-hidden h-full adaptable:h-auto">

       <ul class="w-full pt-8 pl-1">

         <li class="p-2 flex gap-2">
         <div>
          @if(Auth::user()->image == null)
                  <button class="flex-1 rounded-full w-10 h-10 bg-yellow-400 justify-center items-center
                  text-gray-800 font-semibold text-2xl">
                   @php
                  $username = Auth::user()->fullname;
                  $first_letter = substr($username, 0, 1);
                  @endphp
                  {{ $first_letter}}
                  </button>
          @else
              <img class="rounded-full w-10 h-10 justify-center items-center overflow-hidden object-cover" src="{{ Storage::url(Auth::user()->image) }}">
          @endif
         </div>
          <div class="block">
            <div class="text-base font-semibold text-gray-800" href="">{{Auth::user()->fullname}}</div>
            <div class="text-sm font-semibold text-gray-500" href="">{{Auth::user()->email}}</div>
          </div>
         </li>

         @php
             $current_url = Request::url();
         @endphp
        
         <li class="flex gap-2 pl-2 p-3 {{($current_url == route('profile')) ? 'bg-gray-200' : 'hover:bg-gray-100' }} rounded-sm cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
           <a class="text-gray-800 font-semibold text-base" href="{{route('profile')}}">My account</a>
         </li>

         <li class="flex gap-2 pl-2 p-3 {{($current_url == route('order')) ? 'bg-gray-200' : 'hover:bg-gray-100' }} hover:bg-gray-100 rounded-sm cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
          </svg>
           <a class="text-gray-800 font-semibold text-base" href="{{route('order')}}">My orders</a>
         </li>

         <li class="flex gap-2 pl-2 p-3 hover:bg-gray-100 rounded-sm cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
          </svg>
           <a class="text-gray-800 font-semibold text-base" href="">Access & Security</a>
         </li>

         <li class="flex gap-2 pl-2 p-3 hover:bg-gray-100 rounded-sm cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
          </svg>
           <a class="text-gray-800 font-semibold text-base" href="">Cards</a>
         </li>

         <li class="flex gap-2 pl-2 p-3 hover:bg-gray-100 rounded-sm cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
          </svg>
           <a class="text-gray-800 font-semibold text-base" href="">Logout</a>
         </li>

       </ul>

      </div>


      {{-- Container --}}
      <div class="w-full overflow-y-scroll">

        @if(Request::url() == route('profile'))
        <div class="w-full h-full p-4 adaptable:p-0">
          <div class="pt-6 pl-4 adaptable:pl-2">
            <div class="text-gray-800 font-bold text-xl pl-2">My Account</div>
            <div class="mt-4">
              <ul class="max-w-2xl">


                 {{-- Image --}}
                 <li class="flex p-4 border-b">
                  <form class="flex w-full adaptable:block" action="{{route('account.update.image')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PATCH')
                   <div class="flex space-x-2 adaptable:space-x-0 adaptable:max-w-2xl  gap-1">
                      @if(Auth::user()->image == null)
                        <button class="flex-1 rounded-full w-20 h-20 bg-yellow-400 justify-center items-center
                        text-gray-800 font-semibold text-2xl">
                        @php
                        $username = Auth::user()->fullname;
                        $first_letter = substr($username, 0, 1);
                        @endphp
                        {{ $first_letter}}
                        </button>
                      @else
                        <img class="profile-image-btn rounded-full adaptable:mx-auto adaptable:h-20 adaptable:w-20 w-36 h-36 justify-center items-center overflow-hidden object-cover cursor-pointer" id="preview-img" src="{{ Storage::url(Auth::user()->image) }}">
                      @endif
                    </div>
                    <div class="block space-y-2 pl-4 adaptable:mt-4">
                        <div class="text-base font-semibold text-gray-800">Upload your photo</div>
                        <div class="text-sm font-semibold text-gray-600">let the world know who you are through an image</div>
                        <div class="flex space-x-2 w-full ml-auto adaptable:pr-6 adaptable:w-40"> 
                        {{-- Input file --}}
                        <label for="upload-photo" id="upload-photo-btn" class="cursor-pointer">
                          <input type="file" class="hidden" name="profile_image" id="upload-photo"> 
                          <div class="px-1 py-1 adaptable:w-full w-44 mobile:w-full bg-yellow-300 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md text-center">Choose photo</div>
                        </label>
                        {{-- Btn --}}
                         <div class="flex gap-2">
                          <button type="submit" class="ml-auto px-1 py-1 h-8 adaptable:w-full w-32 mobile:w-full bg-gray-300 hover:bg-gray-400 text-gray-900 rounded-sm font-semibold text-base shadow-md" id="confirm-photo-btn"
                          style="display: none;">Upload</button>
                          <button  class="ml-auto px-1 py-1 h-8 adaptable:w-full w-32 mobile:w-full bg-red-500 hover:bg-red-600 text-white rounded-sm font-semibold text-base shadow-md" id="cancel-photo-btn"
                          style="display: none;">Cancel</button>
                         </div>
                        </div>
                    </div>
                  </form>     
                 </li>

                {{-- Name --}}
                <li class="flex p-4 border-b">
                 <form class="flex w-full" action="{{route('account.update.data')}}" method="POST">
                  @csrf
                  @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="fullname">Name</label>
                     <div>
                        <input class="text-gray-600 w-60 text-base outline-none border rounded-sm p-0.5 focus:border-blue-300" 
                        name="fullname" value="{{Auth::user()->fullname}}">
                     </div>
                  </div>
                  <div class="ml-auto pt-6 adaptable:pr-6 adaptable:w-40">
                  <button type="submit" class="px-1 py-1 adaptable:w-full w-44 mobile:w-full bg-yellow-300 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                  </div>
                 </form>
                </li>

                {{-- Email --}}
                <li class="flex p-4 border-b">
                  <form class="flex w-full" action="{{route('account.update.data')}}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="email">Email</label>
                     <div>
                      <input class="text-gray-600 text-base w-60 outline-none border rounded-sm p-0.5 focus:border-blue-300" 
                      name="email" value="{{Auth::user()->email}}">
                     </div>
                  </div>
                 <div class="ml-auto pt-6 adaptable:pr-6 adaptable:w-40">
                  <button class="px-1 py-1 adaptable:w-full w-44 mobile:w-full bg-yellow-300 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                 </div>
                  </form>
                </li>

                {{-- Address --}}
                <li class="flex p-4 border-b">
                  <form class="flex w-full" action="{{route('account.update.data')}}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="address">Address</label>
                     <div>
                      <input class="text-gray-600 text-base w-60 outline-none border rounded-sm p-0.5 focus:border-blue-300" 
                      name="address" value="{{Auth::user()->address}}">
                     </div>
                  </div>
                 <div class="ml-auto pt-6 adaptable:pr-6 adaptable:w-40">
                  <button class="px-1 py-1 adaptable:w-full w-44 mobile:w-full bg-yellow-300 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                 </div>
                  </form>
                </li>

                {{-- City --}}
                <li class="flex p-4 border-b">
                  <form class="flex w-full" action="{{route('account.update.data')}}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="city">City</label>
                     <div class="text-gray-600 text-base">
                      <input class="text-gray-600 text-base w-60 outline-none border rounded-sm p-0.5 focus:border-blue-300" 
                      name="city" value="{{Auth::user()->city}}">
                     </div>
                  </div>
                 <div class="ml-auto pt-6 adaptable:pr-6 adaptable:w-40">
                  <button class="px-1 py-1 adaptable:w-full w-44 mobile:w-full bg-yellow-300 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                 </div>
                  </form>
                </li>

                {{-- Phone --}}
                <li class="flex p-4 border-b">
                  <form class="flex w-full" action="{{route('account.update.data')}}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="phone">Phone</label>
                     <div class="text-gray-600 text-base">
                      <input class="text-gray-600 text-base w-60 outline-none border rounded-sm p-0.5 focus:border-blue-300" 
                      name="phone" value="{{Auth::user()->phone}}">
                     </div>
                  </div>
                 <div class="ml-auto pt-6 adaptable:pr-6 adaptable:w-40">
                  <button class="px-1 py-1 adaptable:w-full w-44 mobile:w-full bg-yellow-300 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                 </div>
                  </form>
                </li>

                {{-- Password --}}
                <li class="flex p-4 border-b">
                  <form class="flex w-full" action="{{route('account.update.password')}}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="phone">Password</label>
                     <div class="space-y-4 gap-2">
                      <input class="text-gray-600 text-base w-60 outline-none border rounded-sm p-0.5 focus:border-blue-300" 
                      type="password" name="current_password" autocomplete required placeholder="Current Password...">
                      <input class="text-gray-600 text-base w-60 outline-none border rounded-sm p-0.5 focus:border-blue-300" 
                      type="password" name="password" required placeholder="New Password...">
                      <input class="text-gray-600 text-base w-60 outline-none border rounded-sm p-0.5 focus:border-blue-300" 
                      type="password" name="confirm_password" required placeholder="Repeat Password...">
                      <div>
                        <a href="{{route('password.request')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                          Forgot your password?
                        </a>
                      </div>
                      <div class="ml-auto pt-2 w-full 2xl:hidden xl:hidden lg:hidden">
                        <button class="px-1 py-1 w-full bg-yellow-300 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                       </div>
                     </div>
                  </div>
                 <div class="ml-auto pt-6 adaptable:hidden mobile:hidden">
                  <button class="px-1 py-1 w-44 bg-yellow-300 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit password</button>
                 </div>
                  </form>
                </li>

              </ul>
            </div>
          </div>

          <div class="profile-image-container w-full h-screen hidden">
           <div class="h-full w-full overlay fixed z-10 left-0 right-0 bottom-0 overflow-auto" style="background-color:rgba(0, 0, 0, 0.644);">
            <div class="max-w-6xl adaptable:max-w-2xl bottom-0 z-10 mx-auto mt-8 overflow-hidden">
              <img class="w-full h-full object-cover" src="{{ Storage::url(Auth::user()->image) }}">
            </div>
           </div>
          </div>

          <script src="{{ asset('js/profile.js') }}"></script>

          <script>
            // Show reviews modal
            const show_img_btn = document.querySelector('.profile-image-btn');
            const show_img = document.querySelector('.profile-image-container');
      
            show_img_btn.addEventListener('click',function(e){
              e.preventDefault();
              show_img.classList.remove('hidden');
              document.body.style.overflow = 'hidden';
            });
      
            window.addEventListener('click',function(e){
              if(e.target.classList.contains('overlay')){
                show_img.classList.add('hidden');
                document.body.style.overflow = "auto";
              }
            });

          </script>
      

        </div>   
        @endif

        @if(Request::url() == route('order'))
           @include('user.order')
        @endif
        
      </div>
    
    </div>
  
    
</body>
</html>