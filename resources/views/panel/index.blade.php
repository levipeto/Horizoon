@extends('panel.layouts.master')

@section('content')
  

<div class="w-full h-screen overflow-hidden">


  <div class="w-full flex bg-gray-900 h-16 adaptable:hidden">
       {{-- Account --}}
       <div class="overflow-hidden bg-g border-b border-gray-700 w-1/4">
        <a href="{{route('home')}}">
          <img class="object-cover object-center h-16 w-52" src="{{URL::to('/')}}/images/official_logo.png"  alt="Workflow">
        </a>
      </div>

      <div class="flex ml-auto space-x-2 p-3 pr-12">
        <div class="text-gray-200 font-normal text-base pt-1.5 pl-1">admin-{{Auth::user()->fullname}}</div> 
        <div class="w-10 h-10 rounded-full">
          @auth
          @if(Auth::user()->image == null)
           <button class="flex-1 rounded-full w-9 h-9 bg-yellow-400 justify-center items-center
           text-gray-800 font-semibold text-2xl">
            @php
           $username = Auth::user()->fullname;
           $first_letter = substr($username, 0, 1);
           @endphp
           {{ $first_letter}}
           </button>
           @else
               <img class="rounded-full w-9 h-9 justify-center items-center overflow-hidden object-cover" src="{{ Storage::url(Auth::user()->image) }}">
           @endif
          @endauth
       </div>
      </div>


  </div>

  <div class="flex w-full overflow-hidden adaptable:block">
  
    {{-- Navbar --}}
    @include('panel.layouts.navbar_panel')
  
    <div class="float-right w-full h-screen adaptable:w-full bg-gray-100 overflow-y-scroll">
  
           @if (Request::url() == route('admin.panel'))
           @include('panel.dashboard')
           @endif
  
           @if (Request::url() == route('add.product'))
           @include('panel.products.add')
           @endif
  
           @if (Request::url() == route('subscribes'))
           @include('panel.subscribes.show')
           @endif
  
           @if (Request::url() == route('orders'))
           @include('panel.order.show')
           @endif
  
      
    </div>
  
  </div>

</div>

@endsection
