<div class="w-full h-full p-4 adaptable:p-0">
    <div class="pt-6 pl-4 adaptable:pl-2">
      <div class="text-gray-800 font-bold text-2xl pl-4">My Orders</div>
      <div class="mt-6 flex-col gap-2">
        @foreach ($orders as $order)
        @php
        $carts = json_decode($order->cart,true);
        @endphp
        <div class="w-full border-b p-4">

           <div class="block">
            <div class="flex text-gray-800 font-semibold text-xl">
                Order number: {{$order->order_key}}
            </div>

            {{-- Order details --}}
            <div class="pt-2 flex space-x-3 gap-2">
                <div class="block">
                    @php
                    $date = new DateTime($order->created_at);
                    $date = $date->format('D m, Y');
                    @endphp
                    <label class="text-base font-semibold text-gray-900" for="date">Date</label>
                    <div class="text-gray-600 text-md">{{$date}}</div>
                </div>
                <div class="block">
                    <label class="text-base font-semibold text-gray-900" for="total">Total</label>
                    <div class="text-gray-600 text-md">€{{number_format($order->total,2,'.','')}}</div>
                </div>
                <div class="block">
                    <label class="text-base font-semibold text-gray-900" for="status">Payment status</label>
                    <div class="text-gray-600 text-md">
                       @if ($order->status == true)
                       paid
                       @else
                       pending
                       @endif
                    </div>
                </div>
            </div>

           </div>

           {{-- Products --}}
           <div class="flex mt-4 gap-2 overflow-auto">
            @foreach ($carts as $cart)
            <div class="block w-44 h-32">
                <div class="w-20 h-20 opacity-80 overflow-hidden">
                    <img class="object-cover" src="{{ Storage::url($cart['image']) }}">
                </div>
                <div class="block">
                    <a class="text-gray-800 text-base font-serif" href="{{ route('product.show', $cart['name']) }}">{{$cart['name']}}</a>
                    <div class="text-gray-600 text-base">Quantity {{$cart['quantity']}}</div>
                </div>
            </div>
            @endforeach
           </div>   
        </div>
        <br>
        @endforeach
        {{-- <table class="mt-2 w-full table-auto">
                <thead>
                    <tr class="text-gray-800 text-base font-semibold">
                        <th></th>
                        <th class="text-gray-700 text-xl">Name</th>
                        <th class="text-gray-700 text-xl">Data</th>
                        <th class="text-gray-700 text-xl">Data</th>
                        <th></th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    @php
                    $carts = json_decode($order->cart,true);
                    @endphp
                    @foreach ($carts as $cart)
                    <tr>
                     
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
        </table> --}}
             {{-- <div class="overflow-hidden w-full p-2 rounded-sm border border-gray-200">
                  <div class="">{{$order->order_key}}</div>
                  <img src="{{ Storage::url($cart['image']) }}" width="100" height="100">
                  <div class="block">
                      <div class="text-gray-800 font-semibold text-xl">{{$cart['name']}}</div>
                      @php
                          $date = new DateTime($cart['created_at']);
                          $date = $date->format('Y-m-d');
                      @endphp
                      <div class="text-gray-800 font-semibold text-xl">{{$date}}</div>
                      <div class="text-gray-800 font-semibold text-xl">€{{number_format($cart['price'],2,'.','')}}</div>
                  </div>
            </div> --}}
      {{-- </div>
    </div>
  </div --}}
{{-- <section class="flex w-full adaptable:mx-auto mobile:max-w-xl p-4 mt-24 overflow-hidden">

  
        <div class="w-2/3 rounded-sm bg-white shadow-md p-2 ml-12">
              <div class="text-2xl font-bold text-gray-800 text-center pt-2">My order</div>

              <div class="mt-4 w-full adaptable:max-w-2xl">
                    <table class="mt-2 w-full table-auto">
                        <thead>
                            <tr class="text-gray-800 text-base font-semibold">
                                <th></th>
                                <th class="text-gray-700 text-xl">Name</th>
                                <th class="text-gray-700 text-xl">Data</th>
                                <th class="text-gray-700 text-xl">Data</th>
                                <th></th>
                              </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            @php
                            $carts = json_decode($order->cart,true);
                            @endphp
                            @foreach ($carts as $cart)
                            <tr>
                             
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                       {{-- <div class="overflow-hidden w-full p-2 rounded-sm border border-gray-200">
                          <div class="">{{$order->order_key}}</div>
                          <img src="{{ Storage::url($cart['image']) }}" width="100" height="100">
                          <div class="block">
                              <div class="text-gray-800 font-semibold text-xl">{{$cart['name']}}</div>
                              @php
                                  $date = new DateTime($cart['created_at']);
                                  $date = $date->format('Y-m-d');
                              @endphp
                              <div class="text-gray-800 font-semibold text-xl">{{$date}}</div>
                              <div class="text-gray-800 font-semibold text-xl">€{{number_format($cart['price'],2,'.','')}}</div>
                          </div>
                       </div>
                       <br> --}}
              {{-- </div>

        </div>

  
      </section> - --}}
