{{-- All reviews --}}
<div class="review-section hidden">
  <div class="h-full overlay w-full fixed z-10 left-0 right-0 bottom-0 overflow-auto" style="background-color:rgba(0, 0, 0, 0.644);">
    <div class="max-w-2xl adaptable:w-full h-96 bg-white p-2 rounded-sm z-10 mx-auto mt-24 overflow-y-auto">

      <div class="block">
        <div class="block text-3xl pt-2 font-bold pl-8 adaptable:pl-1 text-gray-900">
          Customer reviews ({{$reviews->count()}})
          <div class="flex w-full adaptable:pt-1">  
            <div class="text-2xl text-gray-800 pl-1 adaptable:text-xl font-serif">
              {{$product->review_average}}/<span class="text-gray-500">5</span>
            </div>
            <div class="flex ml-auto mr-6 adaptable:pt-1">
              @for ($i = 0; $i < 5; $i++)
              @php
              $cheked = $product->review_average <= $i ? 'text-gray-300' : 'text-yellow-400';
              echo "
              <svg class='$cheked h-8 w-8 adaptable:w-6 adaptable:h-6 flex-shrink-0' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                <path d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z' />
              </svg>";
              @endphp
             @endfor
            </div>
          </div>
        </div>
  
        <div class="block pt-2 text-base text-gray-500 max-w-xl mx-auto">
          We thoroughly check all reviews. Feel free to write anything that complies with the regulations
          If the product is deleted, the reviews will be lost
        </div>
        
      </div>

      {{-- Show reviews --}}
      <div class="reviews w-full p-6 adaptable:p-2 mt-4 h-96 border-t">
         @foreach ($reviews as $review)
              <div class="w-full pt-1 p-2">
                <div class="flex space-x-2 gap-1">
      
                 {{-- Image-user --}}
                 <div class="pt-3">
                  @php
                  $username = $review->author;
                  $first_letter = substr($username, 0, 1);
                  
                  $user = DB::table('users')->where('fullname',$username)->first();
                  @endphp
                  @if(Auth::user()->image == null)
                   <div class="flex-1 rounded-full w-20 h-20 bg-yellow-400 justify-center items-center
                   text-gray-800 font-semibold text-xl">
                    @php
                   $username = Auth::user()->fullname;
                   $first_letter = substr($username, 0, 1);
                   @endphp
                   {{ $first_letter}}
                   </div>
                   @else
                   <div class="rounded-full overflow-hidden w-20 h-20">
                    <img class="object-cover w-full h-full" src="{{ Storage::url($user->image) }}">
                   </div>
                   @endif
                 </div>
      
                 <div class="block pl-1">
                   {{-- Author --}}
                   <div class="flex space-x-2 pt-2 gap-2">
                    <div class="text-base font-semibold text-gray-800">{{$review->author}}</div>
                    @php
                        $date = new DateTime($review->created_at);
                        $date = $date->format('M d, Y');
                    @endphp
                    <div class="text-base text-gray-500 font-semibold">in {{$date}}</div>
                   </div>
      
                   <div class="mt-1 flex items-center">
      
                   @for ($i = 0; $i < 5; $i++)
                    @php
                    $cheked = $review->rating <= $i ? 'text-gray-300' : 'text-yellow-400';
                    echo "
                    <svg class='$cheked h-5 w-5 flex-shrink-0' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='currentColor' aria-hidden='true'>
                      <path d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z' />
                    </svg>";
                    @endphp
                   @endfor
      
                  </div>
      
                   <div class="mt-4 text-base text-gray-600">
                     {{$review->comment}}
                   </div>
                 </div>
                 
                </div>
      
              </div> 
              <hr>
         @endforeach
        
      </div>
      
      </div>
      
  </div>
  
</div>

{{-- Make review --}}
<div class="review-maker hidden">
  <div class="h-full overlay-make-review w-full fixed z-10 left-0 right-0 bottom-0 overflow-auto" style="background-color:rgba(0, 0, 0, 0.644);">
    <div class="max-w-2xl adaptable:w-full p-2 bg-white rounded-sm z-10 mx-auto mt-24 overflow-y-auto">
      <div class="block w-full">
         <form action="{{ route('store.review') }}" method="POST">
           @csrf
           <input type="hidden" value="{{$product->name}}" name="product-name">
           <div class="flex w-full mt-2">
             <div class="text-gray-800 font-semibold text-base pt-3">My ratings</div>
            <div class="pt-1 ml-4">
               <select class="px-3 py-2 p-1 rounded-sm border border-gray-200" name="rating">
                 <option class="text-gray-800 text-md font-semibold" value="1">low</option>
                 <option class="text-gray-800 text-md font-semibold" value="2">discret</option>
                 <option class="text-gray-800 text-md font-semibold" value="3">normal</option>
                 <option class="text-gray-800 text-md font-semibold" value="4">high</option>
                 <option class="text-gray-800 text-md font-semibold" value="5">eccellent</option>
               </select>
               @error('rating')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror 
             </div>
           </div>
           <div class="mt-4">
             <textarea class="w-full border border-gray-300 rounded-sm h-48 outline-none p-2  @error('comment') is-invalid @enderror" name="comment" cols="30" rows="10" required></textarea>
             @error('comment')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                @enderror
           </div>
           <div class="mt-2">
                  <button class="w-full pt-1 bg-indigo-600 border border-transparent rounded-md py-2 px-2 flex items-center
                  justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2
                 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">Send</button>
           </div>
         </form>
      </div>
     </div>
    </div>
</div>