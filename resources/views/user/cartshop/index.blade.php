<!DOCTYPE html>
<html lang="en">
{{-- Head --}}
<head>
 @include('layouts.head')
</head>
<style>
  body{
    background-color: rgb(248, 248, 248)
  }
</style>
<body>

    @include('layouts.navbar')

    @php
    //Get total
    $cart = Auth::user()->cart;
    $name = '';
    $shippcost = '';
    $iva = '';
    $subtotal = 0;
    foreach($cart as $item){
          $subtotal += $item->price * $item->quantity;
          $name = $item->name;
    }
    $total = $subtotal;
    @endphp

{{-- <div class="w-full overflow-hidden p-8" style="background-color: #373f50;">
  <div class="pt-6 pl-6 overflow-hidden">
    <div class="font-semibold text-gray-200 text-3xl adaptable:text-center mt-8">
      My Cart
    </div>
    <button class="px-2 py-2 mr-6 rounded-sm hover:bg-yellow-400 hover:text-white
     text-xs font-semibold text-yellow-300 border border-yellow-400 float-right">
    back to shopping</button>
  </div>
</div> --}}

<div class="w-full adaptable:block adaptable:mt-32 flex h-screen mobile:block mobile:space-x-0 space-x-2 mt-24 p-4">

      <div class="w-1/2 adaptable:w-full mobile:w-full  pt-8 pl-4">
          <div class="h-full w-full block pl-4">
            @if (count(Auth::user()->cart) > 0)
            @foreach ($carts as $cart)
            @php
                $image_cart = $product->where('name',$cart->name)->first();
                $images = json_decode($image_cart->image,true);
            @endphp   

            <div class="w-full adaptable:max-w-xl adaptable:mx-auto flex space-x-2 p-2">
              <div class="w-1/3">
                <img class="object-center object-cover" name='image' src="{{ Storage::url($images[0]) }}" width="140" height="140">
              </div>
              <div class="w-full pt-1">
                 <div class="block">
                      {{-- cart name--}}
                      <div class="text-gray-700 font-semibold text-xl">{{$cart->name}}</div>
                      <div class="pt-2 text-purple-600 text-base font-semibold">Price €{{number_format($cart->price,2,'.','')}}</div>
                      <div class="flex space-x-2 float-right pr-2">
                         <div class="text-base font-semibold text-gray-700 pt-2 pr-2">Quantity</div>
                         <input class="py-2 px-2 rounded-sm border border-gray-300 outline-none" 
                         type="number" value="{{$cart->quantity}}" min="1" max="20">
                      </div>
                      <div class="pt-2">
                        <form action="{{ route('delete_product', $cart->id) }}" method="POST">
                        @csrf
                        <button class="flex space-x-2 gap-1 text-red-500 font-semibold justify-center items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          Remove
                        </button>
                        </form>
                      </div>
                 </div>
              </div>
            </div>
            <hr>
            @endforeach
            <form action="{{ route('clear') }}" method="POST">
             @csrf
            <button class="w-full py-2 px-2 border border-red-400 hover:bg-red-400 hover:text-white shadow-2xl text-red-400 font-semibold text-base rounded-sm">
                Clear cart
              </button>
            </form>
            @else 
            <div class="p-16">
                <div class="text-gray-800 font-bold text-3xl">The cart is empty <a class="text-yellow-500" href="{{ route('home') }}">
                fill now</a></div>
            </div>
            @endif
          </div>

      </div>

      {{-- Total --}}
      <div class="w-1/2 h-full mobile:w-full">
        <form action="{{route('stripe_payment', $total)}}" method="GET">
        @csrf
        <div class="bg-white w-80 mx-auto rounded-sm shadow-2xl p-4 mt-12">
          <div class="p-2">
            <div class="flex-col space-y-3">
                <div class="font-semibold text-gray-700 text-base border-b border-gray-200 p-1">Iva 0.00</div>
                <div class="font-semibold text-gray-700 text-base border-b border-gray-200 p-1">shipping cost €0.00</div>
                <div class="font-semibold text-gray-700 text-base border-b border-gray-200 p-1">Subtotal:  {{"€".number_format($total,2,'.','')}}</div>
                <div class="mt-2 font-semibold text-gray-800 text-2xl p-1">Total:  {{"€".number_format($total,2,'.','')}}</div>
            </div>
            <div class="mt-4">
              <button class="flex w-full py-2 px-2 bg-red-400 shadow-2xl text-white font-semibold text-base rounded-sm">
                <div class="mx-auto flex space-x-2 gap-1 justify-center items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                  </svg>
                  Checkout
                </div>
              </button>
            </div>
          </div>
        </div>
        </form>
      </div>
</div>
   
 

        <script src="{{ asset('js/quantity.js') }}"></script>

        @include('layouts.footer')

</body>
</html>
