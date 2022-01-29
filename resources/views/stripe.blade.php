<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Scripts -->
      <script src="https://js.stripe.com/v3/" defer></script>
      <script src="{{ asset('js/app.js') }}" defer></script>
      <script src="{{ asset('js/jquery.js') }}" defer></script>
      <script src="{{ asset('js/payment.js') }}" defer></script>
      <script src="{{ asset('js/layouts/script.js')}}" defer></script>
      <script src="{{ asset('js/search.js') }}" defer></script>
  
      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <title>{{env('APP_NAME')}} {{config('app_name')}}{{Auth::user()->fullname}} | checkout</title>
   </head>
   <style>
      body{
         position: relative;
         background-color: rgb(252, 252, 252);
         min-height: 1000px;
      }
   </style>
   <body>


   @include('layouts.navbar')


   <script>var paymentConfig = {publicKey: "{{ env('STRIPE_KEY') }}"};</script>

   <div class="max-w-4xl mobile:max-w-2xl adaptable:max-w-2xl mx-auto mt-32 adaptable:mt-44 adaptable:bg-none
   adaptable:shadow-none rounded-sm shadow-2xl bg-white">
     <div class="w-full p-4 pl-4">
      <div class="font-bold text-3xl text-gray-800 pl-1">Check and order</div>
      <div class="mt-6 p-2">
            <div class="text-gray-900 text-xl font-semibold">Credential</div>
            <div class="mt-2">
               <div class="text-gray-500 text-base font-semibold px-1 py-1 rounded-sm border border-gray-200 w-72
            text-center mt-3">{{Auth::user()->fullname}}</div>
               <div class="text-gray-500 text-base font-semibold px-1 py-1 rounded-sm border border-gray-200 w-72
               text-center mt-3">{{Auth::user()->email}}</div>
               <div class="text-gray-500 text-base font-semibold px-1 py-1 rounded-sm border border-gray-200 w-72
               text-center mt-3">{{Auth::user()->address}}</div>
               <div class="text-gray-500 text-base font-semibold px-1 py-1 rounded-sm border border-gray-200 w-72
               text-center mt-3">+{{Auth::user()->phone}}</div>
            </div>
         </div>
         <div class="block space-y-0 p-2">
            <div class="mt-6">
               <div class="text-xl font-semibold text-gray-800">Total €{{number_format($total,2,'.','')}}</div>
            </div>
            <form id="payment-form" action="{{route('stripe.post', $total)}}" method="POST" novalidate>
               @csrf
               <div id="card-element" class="mt-4 border rounded-sm border-gray-200 p-2"></div>
               <div id="card-errors" role="alert"></div>
               <p>
               <input type="hidden" name="total" id="total" required value="{{$total}}">
               <button type="submit" id="pay" class="mt-4 w-60 text-center bg-indigo-600 border 
               border-transparent rounded-md py-2 px-2 font-medium text-white hover:bg-indigo-700">pay now</button>
               </p>
            </form> 
         </div>
         </div>
     </div>
   </div>

   @include('layouts.footer')
   
</body>
</html>