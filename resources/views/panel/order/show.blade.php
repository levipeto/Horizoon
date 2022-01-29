<!DOCTYPE html>
<html lang="en">
<head>
    @include('panel.layouts.head')
</head>
<body>


  <div class="flex w-full overflow-hidden adaptable:block">

    @include('panel.layouts.navbar')

    <div class="float-right w-full h-screen adaptable:w-full bg-gray-100 overflow-y-scroll">
          
        <div class="max-w-5xl adaptable:max-w-2xl mx-auto bg-white rounded-sm mt-12 p-2 overflow-hidden">
            <div class="font-semibold text-gray-800 text-2xl p-4">Orders</div>
            <div class="flex flex-col pr-4">
              <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8 overflow-hidden">
                  <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg ">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Order id
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Date
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Billing name
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Total
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Payment status
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">  
                           Action
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($orders as $order)
                        @php
                            $carts = json_decode($order->cart,true);
                        @endphp
                        @foreach ($carts as $cart)
                        @endforeach
                        @php
                            $bill_name = DB::table('users')->where('id',$cart['user_id'])->first();
                            $bill_name = $bill_name->fullname;
                        @endphp
                        <tr>
                          <td class="px-6 py-4 whitespace-nowrap">
                                #{{$order->order_key}}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                @php
                                    $date = new DateTime($order->created_at);
                                    $date = $date->format('d M  Y');
                                @endphp
                                {{$date}}
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            {{ $bill_name}}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                           €{{number_format($order->total,2,'.','')}}
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($order->status == true)
                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                             paid
                            </span>  
                            @else
                            <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                             unpaid
                            </span> 
                            @endif
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 hover:text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>

    </div>

  </div>

  <script src="{{ asset('js/admin/panel.js') }}"></script>

 
</body>
</html>