@extends('panel.layouts.master')

@section('content')

<div class="flex w-full overflow-hidden adaptable:block">


  {{-- Navbar --}}
  @include('panel.layouts.navbar_panel')
      
  <div class="float-right w-full h-screen adaptable:w-full bg-gray-100 overflow-y-scroll">
    <div class="w-full p-8 overflow-hidden">
    <div class="px-4 py-5 sm:px-6">

  {{-- Show success message --}}
  @if (Session::has('success'))
  @include('messages.success')
  @endif

      <form action="{{ route('edit.product', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

       <div class="float-right pt-2">
         <button class="w-40 bg-yellow-400 text-base text-gray-800 font-semibold p-2 hover:bg-yellow-300 rounded-sm">Save</button>
        </div>
      <h3 class="text-lg leading-6 font-medium text-gray-900">
        Update product
      </h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">
        {{$product->name}}
      </p>
    </div>
    <div class="border-t border-gray-200">
      <dl>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium ">
            Name
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <input class="bg-transparent outline-none" type="text" name="product-name" id="" value="{{$product->name}}">
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Price
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <input class="bg-transparent outline-none" type="number" name="product-price" value="{{$product->price}}">
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Quantity
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <input class="bg-transparent outline-none" type="number" name="product-quantity" min="0" max="100" value="{{$product->stock_qnt}}">
          </dd>
        </div>
        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
           Description
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <textarea class="bg-transparent outline-none w-full border border-gray-300 p-1" name="product-description">
              {{$product->description}}
            </textarea>
          </dd>
        </div>

        {{-- Images upload --}}
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
           Images
          </dt>
          <dd class="block mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="pt-6 flex space-x-2 gap-2 ">
                <div class="flex text-gray-800 font-semibold text-base"> Add images</div>
                <input type="file" multiple name="product-image[]">
              </div>
            </form>
            <div class="flex">
              @php
                   $images = json_decode($product->image);
              @endphp
              @foreach ($images as $key => $image)
              <div class="w-24 h-24 mt-4">
                  <form action="{{ route('delete.image',$product->id) }}" method="POST">
                    @csrf
                    <button type="submit">
                     <div class="delete cursor-pointer">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                       </svg>
                     </div>
                    </button>
                   <div class="p-1 w-16 h-16">
                     <input type="hidden" name="key" value="{{$key}}">
                     <img class="w-full h-full object-cover object-center" src="{{ Storage::url($image) }}">
                   </div>
                 </form>
              </div>
              @endforeach
           </div>
          </dd>
        </div>

      </dl>

    </div>


  <script src="{{ asset('js/uploadimages.js') }}"></script>

  </div>
  </div>
</div>
</div>
    
@endsection