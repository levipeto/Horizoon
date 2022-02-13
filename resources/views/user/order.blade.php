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
</div>
</div>
</div>