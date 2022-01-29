<!DOCTYPE html>
<html lang="en">
 @include('layouts.head')
<body>

    @include('layouts.navbar')


      <div class="prod-container relative max-w-6xl mobile:w-full adaptable:w-full mx-auto adaptable:mt-44 mt-32 overflow-hidden">

      <div class="font-semibold text-gray-800 text-xl pl-6 border-b border-gray-200 p-4
      z-10">{{$name}} <span class="text-base text-gray-500 font-sans">{{count($products)}} available</span></div>
       <div class="w-full grid grid-cols-4 adaptable:grid-cols-2 adaptable:gap-4
        mobile:grid-cols-2
        adaptable:p-2 grid-flow-row adaptable:max-w-xl
        mx-auto mt-2 overflow-hidden box-border">

        @foreach ($products as $product)
          <form action="{{ route('store_product', $product->name)}}" method="POST">
            @csrf
            <a href="{{ route('product.show', $product->name) }}">
            <input type="hidden" name="quantity" value="1">
            {{-- Product --}}
            <div class="product-container h-96 mobile:h-auto p-2 adaptable:w-full 
            mobile:border mobile:border-gray-200 
            overflow-hidden cursor-pointer adaptable:shadow-none mobile:shadow-none
            rounded-sm ">
 
             {{-- Favourites --}}
             <div class="float-left cursor-pointer">
                 <svg xmlns="http://www.w3.org/2000/svg" class="favourites-btn h-6 w-6 text-gray-400 hover:text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                   <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                 </svg>
             </div>
             {{-- Images --}}
             @php
                 $images = json_decode($product->image,true);
             @endphp
             
            <div>
              <input type="hidden" name="image" value="{{$images[0]}}">
              <img class="product-image object-center" src="{{ Storage::url($images[0]) }}" width="200" height="200">
            </div>

             {{-- Details --}}
             <div class="px-6 py-4 mobile:text-base">
               <div class="text-sm font-serif text-gray-500">{{$product->category}}</div>
               <div class="font-semibold text-xl mb-2 text-gray-800 adaptable:text-base mobile:text-base">
                 <a href="{{ route('product.show',  $product->name)}}">{{$product->name}}</a>
               </div>
                <div class="w-full flex space-x-2 adaptable:block mobile:block">
                   <div class="text-blue-600 font-medium text-sm adaptable:text-sm">
                     € {{number_format($product->price,2,'.','')}}
                   </div>
                   <div class="flex justify-center items-center 
                   pl-12 adaptable:pl-0 adaptable:mt-2 mobile:hidden">
                   @for ($i = 0; $i < 5; $i++)
                    @php
                    $cheked = $product->review_average <= $i ? 'text-gray-300' : 'text-yellow-400';
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
              <div class="pt-2 p-4">

                 <button class="add-cart-btn w-60 mobile:hidden bg-yellow-400 hover:opacity-90 text-gray-900 text-base font-semibold py-0.5 px-4 rounded-sm
                 mobile:w-full mobile:px-0.5 mobile:py-0.5">
                   <div class="flex space-x-2 justify-center items-center p-1">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-900" viewBox="0 0 20 20" fill="currentColor">
                       <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                     </svg>
                     Add to cart
                   </div>
                 </button>

               </div>
            </a>
               </form> 
           </div>
           @endforeach
        </div>


    </div>
    
    <script src="{{ asset('js/image_handler.js') }}"></script>
       

    @include('layouts.footer')
    
</body>
</html>