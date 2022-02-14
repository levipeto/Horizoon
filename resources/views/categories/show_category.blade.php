@extends('layouts.master')

@section('title',"categories | $name")

@section('content')
    
<div class="prod-container relative max-w-6xl mobile:w-full adaptable:w-full mx-auto adaptable:mt-44 mt-32 overflow-hidden">

  <div class="font-semibold text-gray-800 text-xl pl-6 border-b border-gray-200 p-4
  z-10">{{$name}} <span class="text-base text-gray-500 font-sans">{{count($products)}} available</span></div>
   <div class="w-full grid grid-cols-4 adaptable:grid-cols-3 adaptable:gap-4
   mobile:grid-cols-2 gap-4
   adaptable:p-2 grid-flow-row adaptable:max-w-xl 
   mx-auto mt-2 overflow-hidden box-border">

    @foreach ($products as $product)
    <div class="product-container mobile:h-auto p-2 adaptable:w-full h-auto
    mobile:border mobile:border-gray-200 border border-gray-200
    overflow-hidden cursor-pointer adaptable:shadow-none mobile:shadow-none
    rounded-sm">
              
     <div class="float-left absolute cursor-pointer">
        <form action="{{ route('store.fav', $product->id) }}" method="POST">
          @csrf
          <button class="favourites-btn">
            @if (in_array($product->name,$fav_list) == false)
            <svg xmlns="http://www.w3.org/2000/svg" class="fav-symbol h-8 w-8 adaptable:w-6 adaptable:h-6 text-gray-400 hover:text-red-500" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg> 
            @else
            <svg xmlns="http://www.w3.org/2000/svg" class="fav-symbol h-8 w-8 adaptable:w-6 adaptable:h-6 text-red-500 hover:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg> 
            @endif
           </button>
        </form>
     </div>

     <form action="{{ route('store_product', $product->name)}}" method="POST">
      @csrf
      <a href="{{ route('product.show', $product->name) }}">
      <input type="hidden" name="quantity" value="1">
     {{-- Images --}}
     @php
         $images = json_decode($product->image,true);
     @endphp

    {{-- Main images --}}
    @if (count($images) > 0)
    <div class="flex pt-1 w-40 h-40 adaptable:w-28 adaptable:h-28 mx-auto overflow-hidden">
      <input type="hidden" name="image" value="{{$images[array_key_first($images)]}}">
      <img class="product-image object-cover object-center block m-auto" src="{{ Storage::url($images[array_key_first($images)]) }}" alt="img no present">
    </div>
    @else
    <div class="flex pt-1 w-40 h-40 adaptable:w-28 adaptable:h-28 mx-auto overflow-hidden">
      <img class="product-image object-cover object-center block m-auto" src="" alt="img no present">
    </div>
    @endif
     

     {{-- Details --}}
     <div class="px-2 py-1.5 mobile:text-base overflow-hidden">
       <div class="text-sm font-serif">{{$product->category}}</div>
       <div class="font-semibold text-xl mb-2 text-gray-800 adaptable:text-base mobile:text-base overflow-hidden">
         <a href="{{ route('product.show',  $product->name)}}">{{$product->name}}</a>
       </div>
        <div class="w-full flex space-x-2 adaptable:block mobile:block overflow-hidden">
           <div class="text-blue-600 font-medium adaptable:text-base adaptable:absolute adaptable:text-center">
             €{{number_format($product->price,2,'.','')}}
           </div>
           <div class="flex justify-center items-center 
           pl-12 adaptable:pl-0 adaptable:mt-2 mobile:hidden">
           @for ($i = 0; $i < 5; $i++)
            @php
            $cheked = $product->average_review <= $i ? 'text-gray-300' : 'text-yellow-400';
            echo "
            <svg class='$cheked h-5 w-5 flex-shrink-0' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
              <path d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z' />
            </svg>";
            @endphp
           @endfor
           </div>
        </div>
     </div>
   
     {{-- Cart button --}}
      <button class="add-cart-btn rounded-full w-10 h-10 bg-yellow-400 overflow-hidden p-1 hover:opacity-80 bottom-0 float-right">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto text-gray-700" viewBox="0 0 20 20" fill="currentColor">
           <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
          </svg>
      </button>

    </a>
       </form> 
   </div> 
    @endforeach
    </div>
</div>

@include('layouts.prod_slideshow')


@endsection
