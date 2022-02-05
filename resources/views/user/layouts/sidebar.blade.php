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
       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
       </svg>
        <a class="text-gray-700 font-normal text-base" href="{{route('profile')}}">My account</a>
      </li>

      <li class="flex gap-2 pl-2 p-3 {{($current_url == route('order')) ? 'bg-gray-200' : 'hover:bg-gray-100' }} hover:bg-gray-100 rounded-sm cursor-pointer">
       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
       </svg>
        <a class="text-gray-700 font-normal text-base" href="{{route('order')}}">My orders</a>
      </li>

      <li class="flex gap-2 pl-2 p-3 hover:bg-gray-100 rounded-sm cursor-pointer">
       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
       </svg>
        <a class="text-gray-700 font-normal text-base" href="">Access & Security</a>
      </li>

      <li class="flex gap-2 pl-2 p-3 {{($current_url == route('cards')) ? 'bg-gray-200' : 'hover:bg-gray-100' }} hover:bg-gray-100 rounded-sm cursor-pointer">
       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
       </svg>
        <a class="text-gray-700 font-normal text-base" href="{{route('cards')}}">Cards</a>
      </li>

      <li class="flex gap-2 pl-2 p-3 hover:bg-gray-100 rounded-sm cursor-pointer">
       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
       </svg>
       <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="text-gray-700 font-normal text-base">Logout</button>
       </form>
      </li>

    </ul>

   </div>