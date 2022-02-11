<!DOCTYPE html>
<html lang="en">
 @include('layouts.head')
<body>

  @include('cookieConsent::index')

        @include('layouts.navbar')

        {{-- Banner --}}
        <div class="relative max-w-6xl mobile:w-full adaptable:w-full mx-auto mt-0 adaptable:mt-24 mobile:mt-28 overflow-hidden">
          <div class="pt-8 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48 adaptable:block mobile:block adaptable:pb-4">
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 sm:static">
              <div class="sm:max-w-lg">
                <h1 class="text-4xl font font-extrabold tracking-tight text-gray-900 sm:text-6xl">
                  Receive the gift card for various discounts
                </h1>
                <p class="mt-4 text-xl text-gray-500">
                  with the gift card your first 10 purchases will be discounted by 10% along with many other news click below for more information
                </p>

              </div>

              <div>
                <div class="mt-10 adaptable:mt-0">
                  <div aria-hidden="true" class="pointer-events-none adaptable:max-w-sm adaptable:max-h-52 adaptable:overflow-hidden adaptable:p-0 adaptable:m-0 lg:absolute lg:inset-y-0 lg:max-w-7xl lg:mx-auto lg:w-full">
                    <div class="absolute adaptable:relative transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                      <div>
                        <img class="adaptable:w-full adaptable:h-64 object-cover object-center"  src="{{URL::to('/')}}/images/hor-giftcard.png">
                      </div>
                    </div>
                  </div>
                  <a href="#" class="inline-block text-center adaptable:mt-8 adaptable:ml-1 adaptable:w-60 mobile:w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 font-medium text-white hover:bg-indigo-700">Look for more</a>
                </div>
              </div>
            </div>
          </div>
        </div>


        {{-- Trending products --}}
        <div class="prod-container relative max-w-6xl mobile:w-full adaptable:w-full mx-auto adaptable:mt-8  overflow-hidden">

        <div class="font-semibold text-gray-800 text-xl pl-6 border-b border-gray-200 p-4
        z-10">Trending products</div>
         <div class="w-full grid grid-cols-4 adaptable:grid-cols-3 adaptable:gap-4
          mobile:grid-cols-2 gap-4
          adaptable:p-2 grid-flow-row adaptable:max-w-xl 
          mx-auto mt-2 overflow-hidden box-border">  


          @foreach ($products as $product)
              {{-- Products --}}
              <div class="product-container mobile:h-auto p-2 adaptable:w-full h-auto
              mobile:border mobile:border-gray-200 border border-gray-200
              overflow-hidden cursor-pointer adaptable:shadow-none mobile:shadow-none
              rounded-sm">
                        
               <div class="float-left absolute cursor-pointer">
                  <form action="{{ route('store.fav', $product->id) }}" method="POST">
                    @csrf
                    <button class="favourites-btn">
                      @if (in_array($product->name,$fav_liste) == false)
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

        {{-- Product in offer --}}
        <div class="relative 2xl:max-w-6xl xl:max-w-6xl lg:max-w-6xl md:max-w-3xl sm:max-w-3xl mobile:max-w-full  mx-auto mt-12 bg-blue-100 overflow-hidden p-4">
          <div class="w-full flex space-x-2 mobile:w-full mobile:block mobile:space-x-0">
            <div class="flex w-1/2 mt-4 mobile:mt-0 p-4 mobile:max-w-2xl mobile:mx-auto
              mobile:w-full">
              <div class="block">

                @php
                $images = json_decode($best_offer_product->image,true);
                @endphp

                <div class="mt-2">

                  <div class="font-bold text-gray-800 text-3xl">
                    {{$best_offer_product->name}}
                  </div>
                  <div class="mt-2 text-base font-semibold text-gray-700"> 
                    {{-- {{$best_offer_product->name}} --}}
                    Our thinnest, lightest notebook, completely transformed by the Apple M1 chip. 
                    CPU speeds up to 3.5x faster. GPU speeds up to 5x faster. 
                  </div>
                  <div class="pt-2">
                    <form action="{{ route('product.show',  $best_offer_product->name)}}" method="GET">
                      <button class="p-2 w-44 mobile:w-full bg-blue-700 text-white rounded-sm font-semibold text-base shadow-2xl">Look offer</button>
                    </form>
                  </div>
                </div>

              </div>
            </div>

            <div class="mr-auto adaptable:mt-6">
              <img class="object-cover object-center" src="{{ Storage::url($images[0]) }}" alt="">
            </div>

          </div>
        </div>

        {{-- Sponsor sections --}}
        <div class="max-w-6xl adaptable:w-full adaptable:pb-48 mx-auto mt-12 overflow-hidden">
          <div class="flex mobile:block">
                <div class="flex border border-gray-300 rounded-sm w-72 h-28 mobile:w-full justify-center items-center">
                  <img src="{{ asset('images/brands/samsung-logo.png') }}" width="100" height="100">
                </div>
                <div class="flex border border-gray-300 rounded-sm w-72 h-28 mobile:w-full justify-center items-center">
                  <img src="{{ asset('images/brands/sony-logo.png') }}" width="100" height="100">
                </div>
                <div class="flex border border-gray-300 rounded-sm w-72 h-28 mobile:w-full justify-center items-center">
                  <img src="{{ asset('images/brands/visa-logo.png') }}" width="100" height="100">
                </div>
                <div class="flex border border-gray-300 rounded-sm w-72 h-28 mobile:w-full justify-center items-center">
                  <img src="{{ asset('images/brands/stripe-logo.png') }}" width="100" height="100">
                </div>
          </div>
        </div>

      </div>

      @include('layouts.footer')
          

</body>
</html>
