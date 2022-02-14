
@php
$products = DB::table('products')->get();
@endphp

<!-- component -->
<div class="flex flex-col max-w-6xl mx-auto adaptable:w-full mobile:w-full adaptable:mt-8">
    <h1 class="flex py-5 font-bold text-xl  adaptable:pl-4 mobile:pl-4 text-gray-800">
    it might interest you
    </h1>
          <div
            class="flex overflow-x-scroll pb-10 hide-scroll-bar">
            <div
              class="flex flex-nowrap">
              @foreach ($products as $product)
              <a href="{{ route('product.show', $product->name) }}">
                <div class="inline-block px-3">
                    <div class="w-44 h-56 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
    
                    @php
                    $images = json_decode($product->image,true);
                    @endphp
    
                    @if (count($images) > 0)
                    <div class="flex pt-1 w-40 h-40 adaptable:w-28 adaptable:h-28 mx-auto overflow-hidden">
                        <input type="hidden" name="image" value="{{$images[array_key_first($images)]}}">
                        <img class="product-image object-cover object-center block m-auto" src="{{ Storage::url($images[array_key_first($images)]) }}" alt="img no present">
                    </div>
                    @else
                    <div class="flex pt-1 w-36 h-36 adaptable:w-28 adaptable:h-28 mx-auto overflow-hidden">
                        <img class="product-image object-cover object-center block m-auto" src="" alt="img no present">
                    </div>
                    @endif
    
                    <div class="mt-1 overflow-hidden">
                        <div class="text-base font-semibold text-gray-800 text-center">{{$product->name}}</div>
                     </div>
    
                    </div>
                  </div>
              </a>
              @endforeach
            </div>
          </div>
    </div>
    <style>
    .hide-scroll-bar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
    .hide-scroll-bar::-webkit-scrollbar {
      display: none;
    }
    </style>