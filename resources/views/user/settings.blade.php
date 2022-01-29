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
                  <form class="flex w-full" action="{{route('account.update.image')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PATCH')
                   <div class="flex space-x-2 adaptable:block adaptable:space-x-0 gap-1">
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
                        <img class="profile-image-btn rounded-full w-36 h-36 justify-center items-center overflow-hidden object-cover cursor-pointer" src="{{ Storage::url(Auth::user()->image) }}">
                      @endif
                    </div>
                    <div class="block space-y-2 pl-4">
                        <div class="text-base font-semibold text-gray-800">Upload your photo</div>
                        <div class="text-sm font-semibold text-gray-600">let the world know who you are through an image</div>
                        <div class="block space-y-2 ml-auto adaptable:pr-6 adaptable:w-40"> 
                        {{-- Input file --}}
                         <input type="file" class="w-32 px-2 py-2 bg-gray-400 rounded-sm" name="profile_image"> 
                        {{-- Btn --}}
                         <button type="submit" class="pt-1 px-1 py-1 h-8 mt-2 adaptable:w-full w-32 mobile:w-full bg-yellow-300 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Upload photo</button>
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
                     </div>
                  </div>
                 <div class="ml-auto pt-6 adaptable:pr-6 adaptable:w-40">
                  <button class="px-1 py-1 adaptable:w-full w-44 mobile:w-full bg-yellow-300 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
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

    {{-- <div class="max-w-6xl adaptable:max-w-2xl mt-24 adaptable:mt-40 mx-auto rounded-sm p-6 ml-12 adaptable:ml-0 adaptable:w-full">
            <div class="text-2xl font-bold text-gray-800 pl-8 pt-2">My Profile</div>
            <div class="mt-4">

              @if(session()->has('message'))
              <ul id="show-errors" class="pl-2 ease-in duration-300" style="display: block">
                <div class="text-green-500 font-semibold text-xl p-2 bg-green-300 rounded-sm">{{ session()->get('message') }}</div>
              </ul>
            </div>
              @endif

               @if (count($errors) > 0)

               <ul id="show-errors" class="pl-2 bg-red-300 rounded-sm shadow-2xl z-10 overflow-hidden" style="display: block">
                    <div class="text-red-500 font-semibold text-xl p-2">{{$errors->first()}}</div>
               </ul>

               <script>
                 const errors = document.getElementById("show-errors");
                  setTimeout(() => {
                      errors.style.transition = 'display 1s ease-in';
                      errors.style.display = "none";
                  }, 2500);
               </script>
                   
               @endif

               {{-- Acount data --}}
               {{-- <ul class="w-full p-2 pt-4 overflow-hidden"> --}}

                   {{-- Name --}}
                   {{-- <li class="flex text-gray-800 font-semibold text-xl border-b border-gray-300 p-4">
                       <div class="flex space-x-2 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            {{Auth::user()->fullname}}
                       </div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="edit-item-btn-name h-8 w-8 text-gray-600 cursor-pointer ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                   </li>

                   <div class="edit-container-name hidden w-full h-40 mt-2 bg-gray-100 rounded-sm p-4">
                       <div class="font-semibold text-gray-600 text-xl pt-4">Edit Name</div>
                       <div class="flex space-x-2 mt-4">
                        <form action="{{route('account.update.data')}}" method="POST">
                            @csrf
                             @method('PATCH')
                            <input class="w-60 px-4 py-2 rounded-sm bg-white outline-none font-semibold text-gray-700 text-base" 
                            type="text" name="fullname" required placeholder="New name...">
                             <button type="submit" class="w-40 p-2 rounded-sm bg-green-500 text-white text-base font-semibold">
                              Confirm</button>
                         </form>
                       </div>
                   </div> --}}

                   {{-- Email --}}
                   {{-- <li class="flex text-gray-800 font-semibold text-xl border-b border-gray-300 p-4">
                       <div class="flex space-x-2 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                                {{Auth::user()->email}}
                       </div>
                       <svg xmlns="http://www.w3.org/2000/svg" class="edit-item-btn-email h-8 w-8 text-gray-600 cursor-pointer ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                       </svg>
                   </li>

                   <div class="edit-container-email hidden w-full h-40 mt-2 bg-gray-50 rounded-sm p-4">
                    <div class="font-semibold text-gray-600 text-xl pt-4">Edit Email</div>
                    <div class="flex space-x-2 mt-4">
                      <form action="{{route('account.update.data')}}" method="POST">
                         @csrf
                         @method('PATCH')
                          <input class="w-60 px-4 py-2 rounded-sm bg-white outline-none font-semibold text-gray-700 text-base" 
                          type="email" name="email" required placeholder="New email...">
                          <button type="submit" class="w-40 px-4 py-2 rounded-sm bg-green-500 text-white text-xl font-semibold">
                           Confirm</button>
                      </form>
                    </div>
                   </div>
  --}}
                   {{-- Phone --}}
                   {{-- <li class="flex text-gray-800 font-semibold text-xl border-b border-gray-300 p-4">
                       <div class="flex space-x-2 gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            +{{Auth::user()->phone}}
                       </div>
                       <svg xmlns="http://www.w3.org/2000/svg" class="edit-item-btn-phone h-8 w-8 text-gray-600 cursor-pointer ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                       </svg>
                   </li>

                   <div class="edit-container-phone hidden w-full h-40 mt-2 bg-gray-50 rounded-sm p-4">
                    <div class="font-semibold text-gray-600 text-xl pt-4">Edit Phone</div>
                    <div class="flex space-x-2 mt-4">
                      <form action="{{route('account.update.data')}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input class="w-60 px-4 py-2 rounded-sm bg-white outline-none font-semibold text-gray-700 text-base" 
                        type="text" name="phone" required placeholder="New Phone...">
                          <button type="submit" class="w-40 px-4 py-2 rounded-sm bg-green-500 text-white text-xl font-semibold">
                           Confirm</button>
                      </form>
                    </div>
                   </div>

                   {{-- Password --}}
                   {{-- <li class="flex text-gray-800 font-semibold text-xl border-b border-gray-300 p-4">
                    <div class="flex space-x-2 gap-2">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                          </svg>
                         My Password
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="edit-item-btn-password h-8 w-8 text-gray-600 cursor-pointer ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </li>

                  <div class="edit-container-password hidden w-full mt-2 bg-gray-50 rounded-sm p-4">
                    <div class="font-semibold text-gray-600 text-xl pt-4">Edit Password</div>
                    <div class="flex space-x-2 mt-4">
                        <form action="{{route('account.update.password')}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="flex flex-col space-y-3 gap-2">
                                <input class="w-60 px-4 py-2 rounded-sm bg-white outline-none font-semibold text-gray-700 text-base" 
                                type="password" name="current_password" autocomplete required placeholder="Current Password...">
                                <input class="w-60 px-4 py-2 rounded-sm bg-white outline-none font-semibold text-gray-700 text-base" 
                                type="password" name="password" required placeholder="New Password...">
                                <input class="w-60 px-4 py-2 rounded-sm bg-white outline-none font-semibold text-gray-700 text-base" 
                                type="password" name="confirm_password" required placeholder="Repeat Password...">
                            </div>
                           <button type="submit" class="w-60 mt-4 px-4 py-2 rounded-sm bg-green-500 text-white text-xl font-semibold">
                           Confirm</button>
                      </form>
                    </div>
                  </div> --}} 

                  {{-- Address --}}
                  {{-- <li class="flex text-gray-800 font-semibold text-xl p-4 border-b border-gray-300">
                    <div class="flex space-x-2 gap-2">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                          </svg>
                         {{Auth::user()->address}}
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="edit-item-btn-address h-8 w-8 text-gray-600 cursor-pointer ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </li>
                  
                  <div class="edit-container-address hidden w-full h-40 mt-2 bg-gray-50 rounded-sm p-4">
                    <div class="font-semibold text-gray-600 text-xl pt-4">Edit Address</div>
                    <div class="flex space-x-2 mt-4">
                      <form action="{{route('account.update.data')}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input class="w-60 px-4 py-2 rounded-sm bg-white outline-none font-semibold text-gray-700 text-base" 
                        type="text" name="address" required placeholder="New Address...">
                          <button type="submit" class="w-40 px-4 py-2 rounded-sm bg-green-500 text-white text-xl font-semibold">
                           Confirm</button>
                      </form>
                    </div>
                  </div>

                  {{-- City --}}
                  {{-- <li class="flex text-gray-800 font-semibold text-xl p-4 border-b border-gray-300"> --}}
                    {{-- <div class="flex space-x-2 gap-2">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                          </svg>
                         {{Auth::user()->city}}
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="edit-item-btn-city h-8 w-8 text-gray-600 cursor-pointer ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </li>

                  <div class="edit-container-city hidden w-full h-40 mt-2 bg-gray-50 rounded-sm p-4">
                    <div class="font-semibold text-gray-600 text-xl pt-4">Edit City</div>
                    <div class="flex space-x-2 mt-4">
                      <form action="{{route('account.update.data')}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input class="w-60 px-4 py-2 rounded-sm bg-white outline-none font-semibold text-gray-700 text-base" 
                        type="text" name="city" required placeholder="New city...">
                          <button type="submit" class="w-40 px-4 py-2 rounded-sm bg-green-500 text-white text-xl font-semibold">
                           Confirm</button>
                      </form>
                    </div>
                  </div>

               </ul>

            </div>
          </div> --}}

          {{-- Orders --}}
          {{-- <div class="max-w-6xl adaptable:max-w-2xl mt-0 adaptable:mt-4 mx-auto rounded-sm p-6 ml-12 adaptable:ml-0 adaptable:w-full">
              <div class="font-semibold text-gray-800 text-2xl p-4">My Orders</div>
              <div class="flex flex-col pr-4">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8 overflow-hidden">
                    <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg ">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                             Order id
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                             Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                             Total
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                             Payment status
                            </th>
                          </tr>
                        </thead> --}}
                       {{-- <tbody class="bg-white divide-y divide-gray-200">
                          @foreach ($orders as $order)
                          @php
                              $carts = json_decode($order->cart,true);
                          @endphp
                          @foreach ($carts as $cart)
                          @endforeach
                          @php
                              $bill_name = DB::table('users')->where('id',$cart['user_id'])->first();
                              $bill_name = $bill_name->fullname;
                          @endphp
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                  #{{$order->order_key}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-900">
                                  @php
                                      $date = new DateTime($order->created_at);
                                      $date = $date->format('d M  Y');
                                  @endphp
                                  {{$date}}
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                             €{{number_format($order->total,2,'.','')}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              @if ($order->status == true)
                              <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                               paid
                              </span>  
                              @else
                              <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                               unpaid
                              </span> 
                              @endif
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

          </div> --}}
    
         <script src="{{ asset('js/profile.js') }}"></script>
    
</body>
</html>