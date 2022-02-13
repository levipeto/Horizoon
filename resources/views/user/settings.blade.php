@extends('layouts.master')

@section('content')

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
    
@endsection
