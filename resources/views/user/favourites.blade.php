<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>

   @include('layouts.navbar')



   <div class="max-w-5xl adaptable:w-full adaptable:mt-44 mx-auto mt-36 p-2 overflow-hidden">
    <div class="flex">
      <div class="text-2xl font-bold text-yellow-500 pl-6"><span class="text-gray-600">{{Auth::user()->fullname}}</span>
        Favourites list <span>({{$favourites->count()}})</span></div>
    </div>

    {{-- Show success message --}}
    @if (Session::has('success'))
       @include('messages.success')
    @endif

   @foreach ($favourites as $favourite)
        <div class="flex space-x-2 border-b adaptable:block border-gray-300 pt-4 p-6">
               {{-- Images --}}
               @php
               $images = json_decode($favourite->image,true);
               @endphp

               <div class="adaptable:w-full adaptable:mx-auto"> 
                  <img class="product-image object-center adaptable:mx-auto" src="{{$images[array_key_first($images)]}}" width="200" height="200">
               </div>

             <div class="block pt-1.5 pl-4">
                {{-- Data format --}}
                @php 
                  $date = new DateTime($favourite->created_at);
                  $date = $date->format('D M, Y');
                @endphp
                <div class="flex">
                  <div class=" font-semibold text-gray-800 text-base">
                     <a href="{{ route('product.show', $favourite->name) }}">{{$favourite->name}}</a>
                  </div>
                  <div class="pl-4 text-gray-600 text-base">Added in {{$date}}</div>
                </div>
                {{-- Reviews --}}
                <div class="flex">
                @for ($i = 0; $i < 5; $i++)
                 @php
                 $product = DB::table('products')->where('name',$favourite->name)->first();
                 $cheked = $product->average_review <= $i ? 'text-gray-300' : 'text-yellow-400';
                 echo "
                 <svg class='$cheked h-5 w-5 flex-shrink-0' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                   <path d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z' />
                 </svg>";
                 @endphp
                @endfor
                <div class="text-gray-700 text-xs font-semibold pt-0.5 p-1">
                  @php
                         $review_product = DB::table('reviews')->where('product',$product->name)->get();
                  @endphp
                   {{$review_product->count()}} reviews
                </div>
                </div>

                <div class="font-semibold text-gray-700 text-lg">€{{number_format($favourite->price,2,'.','')}}</div>

                <div class="flex space-x-2">
                    <form action="{{route("store_product",$product->name)}}" method="POST">
                      @csrf
                      <input type="hidden" name="quantity" value="1">
                      <input type="hidden" name="image" value="{{$images[array_key_first($images)]}}">

                      <button class="inline-block w-32 mt-4 text-center bg-indigo-500 border border-transparent 
                      rounded-md py-1 px-1 text-base font-semibold text-white hover:opacity-90">Add to cart</button>
                    </form>
                    <form action="{{ route('delete.fav', $favourite->id) }}" method="POST">
                     @csrf
                     <button class="inline-block w-32 mt-4 text-center bg-indigo-500 border border-transparent 
                     rounded-md py-1 px-1 text-base font-semibold text-white hover:opacity-90">Remove</button>
                    </form>
                </div>

             </div>
        </div>
   @endforeach
     @if (Auth::user()->favourites->count() > 0)
      <div class="pl-6 pt-4 adaptable:pl-10 p-2">
         <form action="{{ route('clear.fav') }}" method="POST">
         @csrf
         <button class="inline-block w-72 mt-4 text-center bg-red-500 border border-transparent 
         rounded-md py-2 px-1 text-base font-semibold text-white hover:opacity-90">Clear list</button>
         </form>
      </div>
     @endif
   </div>


   @include('layouts.footer')

</body>
</html>