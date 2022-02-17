<header>
<div class="overlay hidden h-full w-full fixed z-10 left-0 right-0 overflow-auto" style="background-color:rgba(0,0,0,0.5);"></div>
<nav class="w-full top-0 m-0 p-0 left-0 right-0 fixed z-10 bg-gray-900 shadow-md">

{{-- Changes added --}}
  
{{-- Dekstop --}}
<div class="w-full relative adaptable:hidden ">

<div class="w-full relative flex items-center justify-between h-16">

{{--Logo--}}
<div class="left-0 -ml-2 overflow-hidden w-1/4">
    <a href="{{route('home')}}">
      <img class="object-cover object-center h-16 w-52" src="{{URL::to('/')}}/images/official_logo.png"  alt="Workflow">
    </a>
</div>

{{--Searchbar--}}
<div class="relative justify-center">
  <div class="relative flex p-1 mx-auto max-w-2xl">
    {{-- search by filter --}}
    <div class="flex">
      <select class="w-40 px-2 rounded-l-sm border border-gray-200 bg-white outline-none text-gray-800 text-base overflow-y-scroll"
     name="search-fitler" id="search-filter">
      <option class="p-1" value="all">all categories</option>
      <option class="p-1" value="smartphone">smartphone</option>
      <option class="p-1" value="computers">computer</option>
      <option class="p-1" value="accessories">accessories</option>
      <option class="p-1" value="tv">tv</option>
      <option class="p-1" value="headphones">headphones</option>
      <option class="p-1" value="videogames">videogames</option>
    </select>
    <input class="search-bar w-96 outline-none px-2 py-2 text-center text-gray-700 font-semibold
    " type="text" id="search">
    <button type="submit" class="rounded-r-sm px-3 py-1 text-gray-800 text-base hover:opacity-90" style="background-color: rgb(255, 168, 62)">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
    </button>
    </div>

    {{--Search-bar items --}}
    <div class="search-items w-full absolute hidden origin-top-right mt-10
     shadow-2xl bg-white ring-1 border border-gray-200
    ring-black 
    ring-opacity-5 focus:outline-none" id="search-items">
   </div>

  </div>
</div>

 {{-- Account --}}
 <div class="ml-auto text-gray-700 text-xl p-1 font-semibold overflow-hidden">
       <div class="flex gap-4 float-right pr-6 justify-center items-center p-1 overflow-hidden">
         {{-- Cart --}}
        <div class="w-8 h-8">
            <button>
              <a href="{{ route('cart') }}">
               <div class="flex">
                <div class="block overflow-hidden">
                  @auth
                  <div class="text-yellow-400 font-semibold text-base pb-2">
                    {{Auth::user()->cart->count()}}
                  </div>
                  @endauth
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mt-1 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                </svg>
               </div>
              </a>
            </button>   
          </div>
          {{-- Menu-account --}}
          <div class="menu w-8 h-8 rounded-full">
               @auth
               @if(Auth::user()->image == null)
                <button class="flex-1 rounded-full w-8 h-8 mt-0.5 bg-yellow-400 justify-center items-center
                text-gray-800 font-semibold text-2xl">
                 @php
                $username = Auth::user()->fullname;
                $first_letter = substr($username, 0, 1);
                @endphp
                {{ $first_letter}}
                </button>
                @else
                    <img class="rounded-full w-8 h-8 mt-0.5 justify-center items-center overflow-hidden object-cover cursor-pointer" src="{{ Storage::url(Auth::user()->image) }}">
                @endif
               @endauth
               @guest
                  <svg xmlns="http://www.w3.org/2000/svg" class="flex-1 w-6 h-8 justify-center items-center
                  text-gray-200 font-semibold text-xl cursor-pointer " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
               @endguest
          </div>
       </div>
      {{-- Item --}}
      <div class="menu-item hidden origin-top-right absolute right-0 z-10 mr-6 mt-12 w-48 rounded-md shadow-2xl py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        <ul>
        @auth
        <li class="hover:bg-gray-50">
          <a href="{{ route('show.fav') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-yellow-500" role="menuitem" tabindex="-1" id="user-menu-item-0">Favourites</a>
        </li>
        <li class="hover:bg-gray-50">
          <a href="{{ route('profile') }}" class="profile-btn block px-4 py-2 text-sm text-gray-700 hover:text-yellow-500" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>
        </li>
       <li>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:text-yellow-500" role="menuitem" tabindex="-1" id="user-menu-item-0">Setting</a>
       </li class="hover:bg-gray-50">
       <li class="hover:bg-gray-50">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button>
              <a class="block px-4 py-2 text-sm text-gray-700 font-semibold hover:text-yellow-500" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            </button>
          </form>
       </li>
       @endauth
       @guest
      <li>
        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-yellow-500" role="menuitem" tabindex="-1" id="user-menu-item-0">Login</a>
      </li>
      <li>
        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:text-yellow-500" role="menuitem" tabindex="-1" id="user-menu-item-1">Register</a>
      </li>
       @endguest
       </ul>
      </div>
     </div>
  </div>

  
{{-- Verical nav --}}
<div class="categories adaptable:hidden mobile:hidden bg-gray-900 border-t border-gray-700">
  <ul class="flex gap-4 pl-5 p-2 overflow-x-auto">
   {{-- Verical nav btn--}}
   <li>
      <button class="vertical-nav-btn opacity-90 hover:opacity-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </button>
    </li>
    
    {{-- Categories --}}
    <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400">
      <a href="{{ route('categories', 'smartphone') }}">Smartphone</a>
    </li>
    <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400">
      <a href="{{ route('categories', 'videogames') }}">Video games</a>
    </li>
    <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400">
      <a href="{{ route('categories', 'computers') }}">Computers</a>
    </li>
    <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400">
      <a href="{{ route('categories', 'accessories') }}">Accessories</a>
    </li>
    <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400">
      <a href="{{ route('categories', 'tv') }}">Tv</a>
    </li>
    <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400">
      <a href="{{ route('categories', 'headphones') }}">HeadPhones</a>
    </li>

    {{-- Options --}}
    <div class="flex pl-4 gap-4 border-l border-gray-700">
      <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400">
        <a class="flex gap-1" href="#">
          <div class="mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="16" height="16"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="original-icon" fill="#ffffff" opacity="0" visibility="hidden"><path d="M20.64,27.52c-9.48687,0 -17.2,7.71313 -17.2,17.2v34.4h19.53813c1.23625,2.59344 2.95625,4.89125 4.99875,6.88h-24.53688v37.84c0,9.48688 7.71313,17.2 17.2,17.2h34.4v-40.3125l3.44,-3.38625l3.44,3.38625v40.3125h89.44c9.48688,0 17.2,-7.71312 17.2,-17.2v-37.84h-79.56344c2.02906,-1.98875 3.74906,-4.28656 4.98531,-6.88h74.57812v-34.4c0,-9.48687 -7.71312,-17.2 -17.2,-17.2h-89.44v19.565c-1.19594,0.56438 -2.35156,1.22281 -3.44,1.98875c-1.08844,-0.76594 -2.24406,-1.42437 -3.44,-1.98875v-19.565zM44.72,51.6c1.06156,0 2.08281,0.12094 3.07719,0.30906c0.215,0.04031 0.43,0.06719 0.63156,0.12094c0.90031,0.20156 1.77375,0.47031 2.62031,0.80625c0.30906,0.12094 0.59125,0.26875 0.90031,0.41656c0.57781,0.26875 1.12875,0.56437 1.65281,0.88687c0.55094,0.34938 1.075,0.71219 1.58563,1.11531c0.30906,0.22844 0.61812,0.48375 0.91375,0.73906c0.87344,0.77937 1.67969,1.63937 2.37844,2.59344c0.69875,-0.95406 1.505,-1.81406 2.37844,-2.59344c0.29563,-0.25531 0.60469,-0.51063 0.91375,-0.73906c0.51063,-0.40312 1.02125,-0.77937 1.58563,-1.11531c0.52406,-0.3225 1.08844,-0.61812 1.65281,-0.88687c0.30906,-0.14781 0.59125,-0.29563 0.90031,-0.41656c0.84656,-0.33594 1.72,-0.60469 2.62031,-0.80625c0.20156,-0.05375 0.41656,-0.08062 0.63156,-0.12094c0.99437,-0.18813 2.01562,-0.30906 3.07719,-0.30906c9.48688,0 17.2,7.71313 17.2,17.2c0,9.48688 -7.71312,17.2 -17.2,17.2h-5.65719l14.95594,14.74094l-4.8375,4.91813l-18.22125,-17.97938l-18.22125,17.97938l-4.8375,-4.91813l14.95594,-14.74094h-5.65719c-9.48687,0 -17.2,-7.71312 -17.2,-17.2c0,-9.48687 7.71313,-17.2 17.2,-17.2zM44.72,58.48c-5.68406,0 -10.32,4.63594 -10.32,10.32c0,5.68406 4.63594,10.32 10.32,10.32h10.32v-10.32c0,-5.68406 -4.63594,-10.32 -10.32,-10.32zM72.24,58.48c-5.68406,0 -10.32,4.63594 -10.32,10.32v10.32h10.32c5.68406,0 10.32,-4.63594 10.32,-10.32c0,-5.68406 -4.63594,-10.32 -10.32,-10.32zM110.08,113.52c1.89469,0 3.44,1.54531 3.44,3.44c0,1.89469 -1.54531,3.44 -3.44,3.44c-1.89469,0 -3.44,-1.54531 -3.44,-3.44c0,-1.89469 1.54531,-3.44 3.44,-3.44zM120.4,113.52c1.89469,0 3.44,1.54531 3.44,3.44c0,1.89469 -1.54531,3.44 -3.44,3.44c-1.89469,0 -3.44,-1.54531 -3.44,-3.44c0,-1.89469 1.54531,-3.44 3.44,-3.44zM130.72,113.52c1.89469,0 3.44,1.54531 3.44,3.44c0,1.89469 -1.54531,3.44 -3.44,3.44c-1.89469,0 -3.44,-1.54531 -3.44,-3.44c0,-1.89469 1.54531,-3.44 3.44,-3.44zM141.04,113.52c1.89469,0 3.44,1.54531 3.44,3.44c0,1.89469 -1.54531,3.44 -3.44,3.44c-1.89469,0 -3.44,-1.54531 -3.44,-3.44c0,-1.89469 1.54531,-3.44 3.44,-3.44z"></path></g><g id="subtracted-icon" fill="#ffffff"><path d="M55.04,27.52v19.565c1.19594,0.56438 2.35156,1.22281 3.44,1.98875c1.08844,-0.76594 2.24406,-1.42437 3.44,-1.98875v-19.565h89.44c9.48688,0 17.2,7.71313 17.2,17.2v34.4h-74.57812c-1.23625,2.59344 -2.95625,4.89125 -4.98531,6.88h79.56344v24.36967c-7.57939,-8.60149 -18.66434,-14.04967 -30.96,-14.04967c-6.12889,0 -11.95696,1.35366 -17.2,3.77677c-1.17723,0.54407 -2.32497,1.14205 -3.44,1.79073c-12.31515,7.1645 -20.64,20.51351 -20.64,35.71249c0,1.15805 0.04833,2.30535 0.14307,3.44h-34.54307v-40.3125l-3.44,-3.38625l-3.44,3.38625v40.3125h-34.4c-9.48687,0 -17.2,-7.71312 -17.2,-17.2v-37.84h24.53688c-2.0425,-1.98875 -3.7625,-4.28656 -4.99875,-6.88h-19.53813v-34.4c0,-9.48687 7.71313,-17.2 17.2,-17.2zM27.52,68.8c0,9.48688 7.71313,17.2 17.2,17.2h5.65719l-14.95594,14.74094l4.8375,4.91813l18.22125,-17.97938l18.22125,17.97938l4.8375,-4.91813l-14.95594,-14.74094h5.65719c9.48688,0 17.2,-7.71312 17.2,-17.2c0,-9.48687 -7.71312,-17.2 -17.2,-17.2c-1.06156,0 -2.08281,0.12094 -3.07719,0.30906c-0.215,0.04031 -0.43,0.06719 -0.63156,0.12094c-0.90031,0.20156 -1.77375,0.47031 -2.62031,0.80625c-0.30906,0.12094 -0.59125,0.26875 -0.90031,0.41656c-0.56438,0.26875 -1.12875,0.56437 -1.65281,0.88687c-0.56438,0.33594 -1.075,0.71219 -1.58563,1.11531c-0.30906,0.22844 -0.61812,0.48375 -0.91375,0.73906c-0.87344,0.77937 -1.67969,1.63937 -2.37844,2.59344c-0.69875,-0.95406 -1.505,-1.81406 -2.37844,-2.59344c-0.29563,-0.25531 -0.60469,-0.51063 -0.91375,-0.73906c-0.51063,-0.40312 -1.03469,-0.76594 -1.58563,-1.11531c-0.52406,-0.3225 -1.075,-0.61812 -1.65281,-0.88687c-0.30906,-0.14781 -0.59125,-0.29563 -0.90031,-0.41656c-0.84656,-0.33594 -1.72,-0.60469 -2.62031,-0.80625c-0.20156,-0.05375 -0.41656,-0.08062 -0.63156,-0.12094c-0.99437,-0.18813 -2.01562,-0.30906 -3.07719,-0.30906c-9.48687,0 -17.2,7.71313 -17.2,17.2zM55.04,68.8v10.32h-10.32c-5.68406,0 -10.32,-4.63594 -10.32,-10.32c0,-5.68406 4.63594,-10.32 10.32,-10.32c5.68406,0 10.32,4.63594 10.32,10.32zM82.56,68.8c0,5.68406 -4.63594,10.32 -10.32,10.32h-10.32v-10.32c0,-5.68406 4.63594,-10.32 10.32,-10.32c5.68406,0 10.32,4.63594 10.32,10.32z"></path></g><g><g fill="#cccccc"><g id="Слой_2" font-family="Inter, sans-serif" font-weight="400" font-size="16" text-anchor="start" visibility="hidden"></g><g id="Android_x5F_4" font-family="Inter, sans-serif" font-weight="400" font-size="16" text-anchor="start" visibility="hidden"></g><g id="Android_x5F_5" font-family="Inter, sans-serif" font-weight="400" font-size="16" text-anchor="start" visibility="hidden"></g><g id="Windows_x5F_8" font-family="Inter, sans-serif" font-weight="400" font-size="16" text-anchor="start" visibility="hidden"></g><g id="Windows_x5F_10" font-family="Inter, sans-serif" font-weight="400" font-size="16" text-anchor="start" visibility="hidden"></g><g id="Color" font-family="Inter, sans-serif" font-weight="400" font-size="16" text-anchor="start" visibility="hidden"></g><g id="IOS" font-family="Inter, sans-serif" font-weight="400" font-size="16" text-anchor="start" visibility="hidden"></g><g id="IOS_copy"><path d="M157.896,137.6c0,2.064 -1.376,3.44 -3.44,3.44h-13.416v13.416c0,2.064 -1.376,3.44 -3.44,3.44c-2.064,0 -3.44,-1.376 -3.44,-3.44v-13.416h-13.416c-2.064,0 -3.44,-1.376 -3.44,-3.44c0,-2.064 1.376,-3.44 3.44,-3.44h13.416v-13.416c0,-2.064 1.376,-3.44 3.44,-3.44c2.064,0 3.44,1.376 3.44,3.44v13.416h13.416c2.064,0 3.44,1.376 3.44,3.44zM172,137.6c0,18.92 -15.48,34.4 -34.4,34.4c-18.92,0 -34.4,-15.48 -34.4,-34.4c0,-18.92 15.48,-34.4 34.4,-34.4c18.92,0 34.4,15.48 34.4,34.4zM165.12,137.6c0,-15.136 -12.384,-27.52 -27.52,-27.52c-15.136,0 -27.52,12.384 -27.52,27.52c0,15.136 12.384,27.52 27.52,27.52c15.136,0 27.52,-12.384 27.52,-27.52z"></path></g></g><g fill="#000000" opacity="0"><g id="IOS" font-family="Inter, sans-serif" font-weight="400" font-size="16" text-anchor="start" visibility="hidden"></g><g id="IOS_copy"><path d="M137.6,96.32c-22.704,0 -41.28,18.576 -41.28,41.28c0,22.704 18.576,41.28 41.28,41.28c22.704,0 41.28,-18.576 41.28,-41.28c0,-22.704 -18.576,-41.28 -41.28,-41.28z"></path></g></g></g></g></svg>
          </div>
          <div>Gift card</div>
        </a>
      </li>
      <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400 left-0">
        <a class="flex gap-1" href="#">
          <div class="mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="16" height="16"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M68.71042,17.2c-1.48937,0.02375 -2.91104,0.62615 -3.96406,1.67969l-26.98698,26.98698h-0.04479c-5.8652,0 -10.78601,4.43196 -11.39948,10.26849l-9.04792,86c-0.71093,6.76533 4.59401,12.66484 11.39948,12.66484h114.66667c6.80547,0 12.11041,-5.89951 11.39948,-12.66484l-9.04792,-86c-0.61347,-5.83653 -5.53428,-10.26849 -11.39948,-10.26849h-3.7625l-21.25364,-21.25365c-1.09692,-1.09743 -2.59177,-1.70345 -4.14323,-1.67969c-1.36686,0.02067 -2.68137,0.529 -3.70651,1.43333l-12.25052,10.82839l-16.31536,-16.31536c-1.09692,-1.09743 -2.59177,-1.70345 -4.14323,-1.67969zM68.8,31.04063l14.82604,14.82604h-29.65209zM104.96927,36.5388l9.32786,9.32786h-14.45651l-2.54192,-2.54193zM60.2,63.06667c4.7472,0 8.6,3.8528 8.6,8.6v14.33333c0,9.48293 7.71707,17.2 17.2,17.2c9.48293,0 17.2,-7.71707 17.2,-17.2v-14.33333c0,-4.7472 3.8528,-8.6 8.6,-8.6c4.7472,0 8.6,3.8528 8.6,8.6c0,3.73813 -2.40227,6.89263 -5.73333,8.0737v6.25964c0,15.8068 -12.85987,28.66667 -28.66667,28.66667c-15.8068,0 -28.66667,-12.85987 -28.66667,-28.66667v-6.25964c-3.33107,-1.18107 -5.73333,-4.33556 -5.73333,-8.0737c0,-4.7472 3.8528,-8.6 8.6,-8.6z"></path></g></g></svg>
          </div>
          <div>Last orders</div>
        </a>
      </li>
      <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400 left-0">
        <a class="flex gap-1" href="{{ route('show.fav') }}">
          <div class="mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="favourites-btn h-4 w-4 text-gray-50" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg>
          </div>
          <div>Favourites</div>
        </a>
      </li>
      <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400 left-0">
        <a class="flex gap-1" href="#">
          <div class="pt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="16" height="16"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M86,0.215c-26.41812,0 -47.945,21.52688 -47.945,47.945c0,42.12656 43.51063,99.28969 45.365,101.695c0.60469,0.79281 1.58563,1.29 2.58,1.29c0.99438,0 1.97531,-0.49719 2.58,-1.29c1.85438,-2.44562 45.365,-60.53594 45.365,-101.695c0,-26.41812 -21.52687,-47.945 -47.945,-47.945zM86,30.96c11.395,0 20.64,9.245 20.64,20.64c0,11.395 -9.245,20.64 -20.64,20.64c-11.395,0 -20.64,-9.245 -20.64,-20.64c0,-11.395 9.245,-20.64 20.64,-20.64zM54.0725,117.175c-27.15719,3.7625 -49.42312,12.38938 -50.525,25.37c-0.06719,0.28219 -0.1075,0.56438 -0.1075,0.86c0,18.54375 42.52969,28.595 82.56,28.595c39.29125,0 81.04156,-9.63469 82.56,-27.52c0.06719,-0.26875 0.1075,-0.55094 0.1075,-0.86c0,-13.58531 -22.8975,-22.58844 -50.8475,-26.445c-10.66937,19.12156 -21.47312,33.72813 -23.7575,36.765c-1.88125,2.49938 -4.89125,4.07156 -8.0625,4.085c-3.1175,0 -6.07375,-1.51844 -7.955,-3.9775c-0.95406,-1.23625 -12.5775,-16.4475 -23.9725,-36.8725z"></path></g></g></svg>
          </div>
           @auth
           <div>Deliver to {{Auth::user()->address}}</div>
           @endauth
           @guest
           <div>My address</div>
           @endguest
        </a>
      </li>
      <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400 left-0">
        <a class="flex gap-1" href="#">
          <div class="mt-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
            width="16" height="16"
            viewBox="0 0 172 172"
            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><g><g><g><path d="M147.77959,90.21224v21.93878c0,5.79184 -4.73878,8.77551 -10.53061,8.77551h-11.23265v-43h11.23265c5.79184,0 10.53061,6.31837 10.53061,12.28571z"></path></g><g><path d="M104.25306,139.3551v0.70204c-0.04625,3.58431 -1.51462,7.00341 -4.08202,9.50498c-2.5674,2.50157 -6.02348,3.88065 -9.60778,3.8338c-7.75453,0 -14.04082,-6.28629 -14.04082,-14.04082c-0.00514,-3.62918 1.4496,-7.10792 4.03673,-9.65306c2.61019,-2.5973 6.14633,-4.04965 9.82857,-4.03673c3.69785,-0.09518 7.2651,1.36994 9.82857,4.03673c2.55461,2.56702 4.00346,6.03167 4.03673,9.65306z"></path></g><g><path d="M47.73878,77.92653v43h-12.98776c-5.8159,0 -10.53061,-4.71472 -10.53061,-10.53061v-21.93878c0,-5.8159 4.71472,-10.53061 10.53061,-10.53061z"></path></g></g><path d="M137.24898,73.71429h-0.35102v-8.6c-0.02958,-13.2514 -5.33462,-25.94559 -14.74286,-35.27755c-9.40682,-9.29648 -22.05308,-14.58149 -35.27755,-14.74286c-27.58553,0.09629 -49.92412,22.43488 -50.02041,50.02041v8.6h-2.10612c-7.72245,0 -13.6898,6.8449 -13.6898,14.74286v21.93878c-0.09417,3.70749 1.30087,7.29819 3.87338,9.96963c2.5725,2.67144 6.10801,4.20095 9.81642,4.2467h12.98776c0.91788,-0.04315 1.77728,-0.46315 2.3753,-1.16083c0.59801,-0.69768 0.88163,-1.6112 0.78389,-2.52489v-43c0,-2.10612 -1.22857,-4.21224 -3.15918,-4.21224h-3.86122v-8.6c0,-23.74824 19.25176,-43 43,-43c11.40139,0.16323 22.29143,4.75845 30.36327,12.81224c8.0754,7.97072 12.62583,18.8412 12.63673,30.18776v8.6h-3.86122c-1.93061,0 -3.15918,2.10612 -3.15918,4.21224v43c-0.09774,0.91369 0.18588,1.82721 0.78389,2.52489c0.59801,0.69768 1.45741,1.11767 2.3753,1.16083h4.03673l-0.35102,0.52653c-5.30253,6.95584 -13.54335,11.0438 -22.2898,11.05714c-0.67548,-3.38103 -2.3223,-6.49169 -4.73878,-8.95102c-3.21217,-3.32698 -7.66183,-5.17041 -12.28571,-5.0898c-4.57256,0.00896 -8.96837,1.76729 -12.28571,4.91429c-3.30197,3.30116 -5.13639,7.79234 -5.0898,12.46122c0.09625,9.62455 7.92599,17.37599 17.55102,17.37551c8.22932,0.05805 15.32206,-5.77867 16.84898,-13.86531c10.96899,0.0415 21.31368,-5.09831 27.90612,-13.86531l3.33469,-4.91429c7.54694,-0.52653 12.28571,-5.26531 12.28571,-12.1102v-21.93878c0,-7.54694 -5.61633,-16.49796 -13.6898,-16.49796zM43.87755,80.73469v36.85714h-9.12653c-1.84722,-0.04492 -3.59781,-0.83475 -4.85386,-2.18996c-1.25604,-1.35521 -1.91084,-3.16066 -1.81553,-5.00596v-21.93878c0,-4.03673 2.80816,-7.72245 6.66939,-7.72245zM90.56327,149.88571c-5.71022,-0.09058 -10.34409,-4.64721 -10.53061,-10.3551c-0.02619,-2.75632 1.04765,-5.40934 2.98367,-7.37143c1.96532,-1.95315 4.60169,-3.08302 7.37143,-3.15918c2.77765,0.03956 5.42716,1.17507 7.37143,3.15918c1.93602,1.96209 3.00986,4.61511 2.98367,7.37143v0v0.35102c0.00041,2.68394 -1.07764,5.25548 -2.99191,7.13674c-1.91426,1.88126 -4.50416,2.91443 -7.18769,2.86735zM143.91837,112.15102c0,4.73878 -4.56327,5.44082 -6.66939,5.44082h-7.37143v-36.85714h7.37143c3.86122,0 6.66939,5.44082 6.66939,9.47755z"></path></g></g></g></svg>
          </div>
          <div>Support</div>
        </a>
      </li>
    </div>

  </ul>
</div>

  
</div>

  
{{-- Mobile/other--}}
<div class="block max-w-7xl relative large:hidden p-0.5">
  <div class="flex space-x-2 w-full pt-0 justify-center items-center h-16">
     {{--Logo--}}
     <div class="w-full overflow-hidden -ml-5">
      <a href="{{route('home')}}">
        <img class="object-cover object-center h-52 w-52" src="{{URL::to('/')}}/images/official_logo.png">
      </a>
     </div>

     <div class="overflow-hidden pr-4 pt-2.5">
      <button>
        <a href="{{ route('cart') }}">
         <div class="flex">
          <div class="block overflow-hidden">
            @auth
            <div class="text-yellow-400 font-semibold text-base pb-2">
              {{Auth::user()->cart->count()}}
            </div>
            @endauth
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-200" viewBox="0 0 20 20" fill="currentColor">
            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
          </svg>
         </div>
        </a>
      </button>   
     </div>

    {{-- Menu --}}
    <div class="pl-2 pt-1 w-auto justify-center items-center ml-auto pr-8">
      <div class="vertical-nav-btn-mobile font-bold text-3xl text-gray-200">
        @auth
       <div class="w-8 h-8 rounded-full">
        @if(Auth::user()->image == null)
        <button class="flex-1 rounded-full w-8 h-8 bg-yellow-400 justify-center items-center
        text-gray-800 font-semibold text-2xl">
         @php
        $username = Auth::user()->fullname;
        $first_letter = substr($username, 0, 1);
        @endphp
        {{ $first_letter}}
        </button>
        @else
            <img class="rounded-full w-8 h-8 justify-center items-center overflow-hidden object-cover" src="{{ Storage::url(Auth::user()->image) }}">
        @endif
       </div>
        @endauth
        @guest
        <button class="h-full justify-center items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="menu-mobile h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
        @endguest
      </div>


     </div>

  </div>

  {{-- Searchbar --}}
   <div class="flex w-full mt-0 pl-2 p-2 mobile-searchbar transition duration-500 ease-in-out">
      <input class="search-bar-mob rounded-md w-full outline-none px-2 py-2 shadow-xl text-center text-gray-700 font-semibold
      " id="search-mob" type="text" placeholder="Search something...">
      {{--Search-bar items --}}
      <div class="search-items-mob hidden w-full absolute mt-12 pr-2
      shadow-2xl py-1 bg-white ring-1 border border-yellow-400
      ring-black z-10
      ring-opacity-5 focus:outline-none" id="search-items-mob">
      </div>
   </div>  
    
  <div class="categories 2xl:hidden xl:hidden bg-gray-900 border-t border-gray-700">
    <ul class="flex gap-4 pl-2 overflow-x-scroll p-1.5" id="sidebar">
      {{-- Categories --}}
      <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400 p-0.5">
        <a href="{{ route('categories', 'smartphone') }}">Smartphone</a>
      </li>
      <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400 p-0.5">
        <a href="{{ route('categories', 'videogames') }}">VideoGames</a>
      </li>
      <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400 p-0.5">
        <a href="{{ route('categories', 'computers') }}">Computers</a>
      </li>
      <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400 p-0.5">
        <a href="{{ route('categories', 'accessories') }}">Accessories</a>
      </li>
      <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400 p-0.5">
        <a href="{{ route('categories', 'tv') }}">Tv</a>
      </li>
      <li class="text-gray-100 font-semibold text-sm hover:text-yellow-400 p-0.5">
        <a href="{{ route('categories', 'headphones') }}">HeadPhones</a>
      </li>

    </ul>
   </div>

</div>


{{-- Vertical bar dekstop --}}
<div class="vertical-nav-overlay hidden h-full w-full fixed z-10 left-0 right-0 bottom-0 overflow-auto" style="background-color:rgba(0,0,0,0.5);"></div>
<div class="vertical-nav-items shadow-2xl left-0 inset-y-0 absolute top-0 z-10 bg-gray-50 h-screen overflow-y-scroll 
transform -translate-x-full transition duration-300 ease-in-out" style="width: 380px">
  <div class="bg-gray-900 top-0 p-2">
    <div class="flex">
     <div class="text-gray-100 font-bold text-xl p-1 pl-2">
       @auth
       <div class="flex gap-2">
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
        Hello, {{Auth::user()->fullname}}
       </div>
       @endauth
       @guest
        Hello, sign in
       @endguest
      </div>
      <div class="close-vertical-nav p-2 ml-auto cursor-pointer">
       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
       </svg>
      </div>
    </div>
   </div>
   <ul class="block pl-2 mt-4">
     <li class="text-gray-900 text-xl font-bold p-2">
        Categories
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2 cursor-pointer">
       <a href="{{ route('categories', 'smartphone') }}">Smartphone</a>
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
       <a href="{{ route('categories', 'videogames') }}">Video games</a>
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
       <a href="{{ route('categories', 'computers') }}">Computers</a>
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
       <a href="{{ route('categories', 'accessories') }}">Accessories</a>
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
       <a href="{{ route('categories', 'tv') }}">Tv</a>
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
       <a href="{{ route('categories', 'headphones') }}">HeadPhones</a>
     </li>
     <hr>
     {{-- Services --}}
     <li class="text-gray-900 text-xl font-bold p-2">
       Services
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
     <a href="">Gift card</a>
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
       <a href="#">
         Last order
       </a>
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
       <a href="#">
         @auth
         Deliver to {{Auth::user()->address}}
         @endauth
         @guest
         My address
         @endguest
       </a>
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
       <a href="#">
       Support
       </a>
     </li>
     <hr>
     {{-- Account --}}
     <li class="text-gray-900 text-xl font-bold p-2">
       Account
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
     @auth
     <a href="{{route('profile')}}">Profile</a>
     @endauth
     @guest
     <a href="{{route('login')}}">Login</a>
     @endguest
     </li>
     @auth
    <li class="hover:bg-gray-200 p-2">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="text-gray-800 font-semibold text-base  ">
          Sign out
          </button>
        </form>
     </li>
     @endauth
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
       <a href="#">
         @auth
         Deliver to {{Auth::user()->address}}
         @endauth
         @guest
         My address
         @endguest
       </a>
     </li>
     <li class="text-gray-800 font-semibold text-base hover:bg-gray-200 p-2">
       <a href="#">
       Support
       </a>
     </li>
   </ul>
 </div>

 
{{-- Vertical bar mobile --}}
<div class="vertical-nav-overlay-mobile hidden h-full w-full fixed z-10 left-0 right-0 bottom-0 overflow-auto" style="background-color:rgba(0,0,0,0.5);"></div>
<div class="vertical-nav-items-mobile shadow-2xl left-0 inset-y-0 absolute top-0 z-10 bg-gray-50 h-screen w-3/4 mobile:w-full overflow-y-scroll 
  transform -translate-x-full transition duration-300 ease-in-out">
  <div class="bg-gray-900 p-2 overflow-hidden">
    <div class="flex">
     <div class="flex gap-2 text-gray-100 font-bold text-sm  mt-1.5 pl-2  p-1 overflow-hidden">
       @auth
       <div class="w-6 h-6 rounded-full">
        @if(Auth::user()->image == null)
        <button class="flex-1 rounded-full w-8 h-8 bg-yellow-400 justify-center items-center
        text-gray-800 font-semibold text-2xl">
         @php
        $username = Auth::user()->fullname;
        $first_letter = substr($username, 0, 1);
        @endphp
        {{ $first_letter}}
        </button>
        @else
            <img class="rounded-full w-6 h-6 justify-center items-center overflow-hidden object-cover" src="{{ Storage::url(Auth::user()->image) }}">
        @endif
       </div>
        <div class="pl-4 text-gray-50 font-semibold text-base">Hello, {{Auth::user()->fullname}}</div>
       @endauth
       @guest
        Hello, sign in
       @endguest
      </div>
      <div class="close-vertical-nav-mobile p-2 ml-auto cursor-pointer">
       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
       </svg>
      </div>
    </div>
   </div>
   <ul class="block pl-2 mt-4">
     <li class="text-gray-900 text-xl font-bold p-2">
        Categories
     </li>
     <li class="text-gray-600 font-medium text-base hover:bg-gray-200 p-2">
       <a href="{{ route('categories', 'smartphone') }}">Smartphone</a>
     </li>
     <li class="text-gray-600 font-medium text-base hover:bg-gray-200 p-2">
       <a href="{{ route('categories', 'videogames') }}">Video games</a>
     </li>
     <li class="text-gray-600 font-medium text-base hover:bg-gray-200 p-2">
       <a href="{{ route('categories', 'computers') }}">Computers</a>
     </li>
     <li class="text-gray-600 font-medium text-base hover:bg-gray-200 p-2">
       <a href="{{ route('categories', 'accessories') }}">Accessories</a>
     </li>
     <li class="text-gray-600 font-medium text-base hover:bg-gray-200 p-2">
       <a href="{{ route('categories', 'tv') }}">Tv</a>
     </li>
     <li class="text-gray-600 font-medium text-base hover:bg-gray-200 p-2">
       <a href="{{ route('categories', 'headphones') }}">HeadPhones</a>
     </li>
     <hr>
     {{-- Services --}}
     <li class="text-gray-900 text-xl font-bold p-2">
       Services
     </li>
     <li class="text-gray-600 font-medium text-base hover:bg-gray-200 p-2">
      <a href="{{ route('show.fav')}}">
        Favourites
      </a>
     </li>
     <li class="text-gray-600 font-medium text-base hover:bg-gray-200 p-2">
       <a href="{{ route('order')}}">
         Last order
       </a>
     </li>
     <li class="text-gray-600 font-medium text-base hover:bg-gray-200 p-2">
       <a href="#">
         @auth
         Deliver to {{Auth::user()->address}}
         @endauth
         @guest
         My address
         @endguest
       </a>
     </li>
     <li class="text-gray-600 font-medium text-base hover:bg-gray-200 p-2">
       <a href="#">
       Support
       </a>
     </li>
     <hr>
     {{-- Account --}}
     <li class="text-gray-900 text-xl font-bold p-2">
       Account
     </li>
     <li class="text-gray-600 font-medium text-base hover:bg-gray-200 p-2">
     @auth
     <a href="{{route('profile')}}">Profile</a>
     @endauth
     @guest
     <a href="{{route('login')}}">Login</a>
     @endguest
     </li>
      @auth
      <li class="hover:bg-gray-200 p-2">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="text-gray-600 font-medium text-base  ">
          Sign out
          </button>
        </form>
     </li>
      @endauth
     <li class=" hover:bg-gray-200 p-2">
       <a class="text-gray-600 font-semibold text-base" href="#">
         @auth
         Deliver to {{Auth::user()->address}}
         @endauth
         @guest
         My address
         @endguest
       </a>
     </li>
     <li class="text-gray-600 font-semibold text-base hover:bg-gray-200 p-2">
       <a class="text-gray-600 font-semibold text-base" href="">
       Support
       </a>
     </li>
   </ul>
 </div>

</nav>

</header>
