@php
$current_url = Request::url();
@endphp

{{-- Dekstop --}}
<div class="nav relative float-left 2xl:w-1/5 xl:w-1/5 lg:w-1/3 bg-gray-900 h-screen shadow-2xl overflow-hidden
adaptable:hidden">
        <div class="block w-full pt-2">
            {{-- All section --}}
            <div class="block mt-6">
                <ul class="mt-6 text-gray-400 font-semibold text-base">
                  <li class="flex gap-1.5 pl-4 p-2 {{($current_url == route('admin.panel')) ? 'bg-gray-700' : '' }} cursor-pointer hover:bg-gray-800 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M2 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4zM8 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H9a1 1 0 01-1-1V4zM15 3a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V4a1 1 0 00-1-1h-2z" />
                    </svg>
                    <a href="{{ route('admin.panel')}}">Dashboard</a>
                  </li>
                  <li class="flex gap-1.5 pl-4 p-2 {{($current_url == route('add.product')) ? 'bg-gray-700' : '' }} cursor-pointer hover:bg-gray-800 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 text-gray-400 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                     <a href="{{ route('add.product') }}">Add product</a>
                  </li>
                  <li class="flex gap-1.5 pl-4 p-2 {{($current_url == route('subscribes')) ? 'bg-gray-700' : '' }} cursor-pointer hover:bg-gray-800 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                    </svg>
                    <a href="{{route('subscribes')}}">Subscribes</a>
                 </li>
                  <li class="flex gap-1.5 pl-4 p-2 {{($current_url == route('orders')) ? 'bg-gray-700' : '' }} cursor-pointer hover:bg-gray-800 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 text-gray-400 " viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                    </svg>
                    <a href="{{route('orders')}}">Order</a>
                  </li>
                  <li class="flex gap-1.5 pl-4 p-2  cursor-pointer  hover:bg-gray-800 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <a href="">Logout</a>
                  </li>

                </ul>
            </div>
        </div>
</div>

{{-- Mobile --}}
<div class="w-full flex p-4 bg-gray-900 overflow-hidden 2xl:hidden xl:hidden lg:hidden">

  {{-- Menu --}}
   <button class="menu cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-100" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
      </svg>
   </button>

   {{-- Logo --}}
   <div class="mx-auto overflow-hidden">
    <a href="{{route('home')}}">
      <img class="object-cover object-center h-10 w-52" src="{{URL::to('/')}}/images/official_logo.png"  alt="Workflow">
    </a>
   </div>

   {{-- Items --}}
   <div class="overlay hidden h-full w-full fixed z-10 left-0 right-0 bottom-0 overflow-auto" style="background-color:rgba(0,0,0,0.5);"></div>
   <div class="menu-items w-3/4 shadow-2xl left-0 inset-y-0 absolute top-0 z-10 bg-gray-900 h-screen transform -translate-x-full 
   transition duration-300 ease-in-out">
    <div class="block w-full">
      <div class="flex border-b border-gray-600 p-4">
        <div class="w-12 h-12 rounded-full">
              @auth
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
              @endauth
           </div>
         <div class="text-gray-100 font-semibold text-base pt-1 pl-1">{{Auth::user()->fullname}}</div>
      </div>
        {{-- All section --}}
        <div class="block mt-6">
            <ul class="mt-6text-gray-400 font-semibold text-base">
              <li class="flex gap-1.5 pl-4 p-2 {{($current_url == route('admin.panel')) ? 'bg-gray-700' : '' }} cursor-pointer hover:bg-yellow-400 text-gray-50 rounded-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 text-gray-50" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4zM8 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H9a1 1 0 01-1-1V4zM15 3a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V4a1 1 0 00-1-1h-2z" />
                </svg>
                <a href="{{ route('admin.panel')}}">Dashboard</a>
              </li>
              <li class="flex gap-1.5 pl-4 p-2 {{($current_url == route('add.product')) ? 'bg-gray-700' : '' }} cursor-pointer hover:bg-yellow-400 text-gray-50 rounded-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 text-gray-50 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                 <a href="{{ route('add.product') }}">Add product</a>
              </li>
              <li class="flex gap-1.5 pl-4 p-2 {{($current_url == route('subscribes')) ? 'bg-gray-700' : '' }} s cursor-pointer  hover:bg-yellow-400 text-gray-50 rounded-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 text-gray-50" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                </svg>
                <a href="{{route('subscribes')}}">Subscribes</a>
             </li>
              <li class="flex gap-1.5 pl-4 p-2 {{($current_url == route('orders')) ? 'bg-gray-700' : '' }}  cursor-pointer hover:bg-yellow-400 text-gray-50 rounded-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 text-gray-50 " viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                </svg>
                <a href="{{route('orders')}}">Order</a>
              </li>
              <li class="flex gap-1.5 pl-4 p-2 cursor-pointer  hover:bg-yellow-400 text-gray-50 rounded-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mt-0.5 text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <a href="">Logout</a>
              </li>

            </ul>
        </div>
    </div>
</div>

</div>

