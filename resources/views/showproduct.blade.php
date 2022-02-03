<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

@include('layouts.navbar')

  
<div class="bg-white mt-24 adaptable:mt-32">
  <div class="pt-6">

  <form action="{{ route('store_product', $product->name)}}" method="POST">
   @csrf
   <input type="hidden" name="image" value="{{$images[0]}}">
        
   <!-- Image gallery -->
   <div class="images-container mt-6 w-full mx-auto sm:px-6 lg:max-w-7xl lg:px-8 overflow-hidden">
    <div class="adaptable:block flex w-full mobile:block overflow-hidden ">
    <div>
      {{-- Main photo--}}
       <img src="{{ Storage::url($images[0])}}" class="main-image adaptable:w-full adaptable:h-full adaptable:mx-auto object-center object-cover"
       width="350" height="350">
    </div>
     <div class="block">
       {{-- Others photos --}}
       <div class="w-full pl-6 pt-4 flex gap-2 adaptable:mt-4 mobile:mt-4 overflow-hidden">
        @foreach ($images as $image)
        <div class="w-20 h-20 p-1 border border-gray-300 rounded-sm opacity-70 bg-gray-50 cursor-pointer hover:opacity-100 overflow-hidden">
          <img src="{{ Storage::url($image)}}" class="image-gallery w-full h-full object-center object-cover">
        </div>
        @endforeach
      </div>
     </div>
    </div>
  </div>

  <!-- Product info -->
  <div class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
    <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
      <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">
       {{$product->name}}
      </h1>
  </div>

    <!-- Options -->
  <div class="mt-4 lg:mt-0 lg:row-span-3">
      <p class="text-3xl text-gray-900">€{{number_format($product->price,2,'.','')}}</p>

      {{-- Qunatity --}}
      <div class="pt-4">
       @if ($product->stock_qnt > 0)
       <div class="flex space-x-2 gap-2 items-center">
        <h3 class="text-base font-semibold text-gray-800 justify-center items-center">Quantity</h3>
        <select class="border border-gray-300 p-2 w-20 rounded-sm outline-none text-center" name="quantity">
          @php
            for ($i=1; $i <= $product->stock_qnt; $i++) { 
              echo "<option value='$i'>$i</option>";
            }
          @endphp
        </select>
      </div> 
       @else
       <div class="flex space-x-2 gap-2 items-center">
        <h3 class="text-base font-semibold text-gray-800 justify-center items-center">Quantity</h3>
        <select class="border border-gray-300 p-2 w-20 rounded-sm outline-none text-center" name="quantity" disabled>
         <option value="0">0</option>
        </select>
      </div>  
       @endif
  </div>

      <!-- Reviews -->
  <div class="mt-6">
        <h3 class="sr-only">Reviews</h3>
        <div class="flex items-center">
          <div class="flex items-center">
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
          <p class="sr-only">4 out of 5 stars</p>
          <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">{{$reviews->count()}} reviews</a>
        </div>
  </div>
         @if ($product->stock_qnt > 0)
        {{-- Checkout btn --}}
         <button type="submit" class="mt-10 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add to bag</button>
         @else
         <div class="mt-10 w-full border border-red-500 rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-red-500">Product no available</div>
         @endif
      </form>

      <form action="{{ route('store.fav', $product->id) }}" method="POST">
        @csrf
        <button type="submit" class="favourites-btn mt-4 w-full bg-gray-800 border border-transparent rounded-md py-3 px-8 flex space-x-2 gap-2 items-center justify-center text-base font-medium text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          @if (in_array($product->name,$fav_liste) == false)
            <svg xmlns="http://www.w3.org/2000/svg" class="fav-symbol h-6 w-6 text-gray-400 hover:text-red-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg> 
          @else
            <svg xmlns="http://www.w3.org/2000/svg" class="fav-symbol h-6 w-6 text-red-500 hover:text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg> 
          @endif
          Add to favourites
        </button>
      </form>

  </div>

  <div class="py-10 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
      <!-- Description and details -->
      <div>
        <h3 class="sr-only">Description</h3>

        <div class="space-y-6">
          <p class="text-base text-gray-900">
            {{$product->description}}
          </p>
        </div>
      </div>

      <div class="mt-10">
        <h3 class="text-sm font-medium text-gray-900">Highlights</h3>

        <div class="mt-4">
          <ul role="list" class="pl-4 list-disc text-sm space-y-2">
            <li class="text-gray-400"><span class="text-gray-600">Lorem Ipsum is simply dummy text</span></li>

            <li class="text-gray-400"><span class="text-gray-600">Lorem Ipsum is simply dummy text</span></li>

            <li class="text-gray-400"><span class="text-gray-600">Lorem Ipsum is simply dummy text</span></li>

            <li class="text-gray-400"><span class="text-gray-600">Lorem Ipsum is simply dummy text</span></li>
          </ul>
        </div>
    </div>

    <div class="mt-10">
        <h2 class="text-sm font-medium text-gray-900">Details</h2>

        <div class="mt-4 space-y-6">
          <p class="text-sm text-gray-600">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
             Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
            when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
      </div> 

    </form>

    <div class="mt-6 block">
      {{-- Show review --}}
      @if ($reviews->count() > 0)
      <button class="show-reviews-btn text-base font-semibold text-indigo-500 w-full border border-indigo-500 rounded-sm px-2 py-2">
      Show reviews ({{$reviews->count()}})</button>
      @else 
      <button class="show-reviews-btn text-md font-semibold text-gray-800 cursor-text" disabled>
      there is no review to show (0)
      </button>
      @endif


      {{-- Make review --}}
      <button class="reviews-section-btn w-full mt-6 show-reviews-btn text-base text-center font-semibold text-indigo-500 border border-indigo-500 rounded-sm px-2 py-2">
      Make your review
      </button>

    </div>

      </div>
    </div>

    {{-- Show reviews --}}
    @include('reviews')

    @error('review-error')
    @include('layouts.modals.modal_review')
    @enderror

    <script src="{{ asset('js/products.js') }}"></script>

    <script>
       /**
       * Images gallery
       */
      const images_gallery = document.querySelectorAll(".image-gallery");
      const main_image = document.querySelector(".main-image");
      const images_container = document.querySelectorAll(".images-container");

      images_gallery.forEach(function (item) {
          item.addEventListener("mouseover", function (e) {
              main_image.src = item.src;
              console.log('here');
          });
      });

      // Show reviews modal
      const show_rev_btn = document.querySelector('.show-reviews-btn');
      const show_reviews = document.querySelector('.review-section');

      show_rev_btn.addEventListener('click',function(e){
        e.preventDefault();
        show_reviews.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
      });

      //Reviews maker modal
      const rev_section_btn = document.querySelector('.reviews-section-btn');
      const show_reviews_section = document.querySelector('.review-maker');

      rev_section_btn.addEventListener('click',function(e){
        e.preventDefault();
        show_reviews_section.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
      });

      // Close modals
      window.addEventListener('click',function(e){
      if(e.target.classList.contains('overlay')){
        show_reviews.classList.add('hidden');
        document.body.style.overflow = "auto";
      }
      if(e.target.classList.contains('overlay-make-review')){
        show_reviews_section.classList.add('hidden');
        document.body.style.overflow = "auto";
      }
      });
    </script>

  
     @include('cookieConsent::index')
     @include('layouts.footer')

</body>
</html> 

