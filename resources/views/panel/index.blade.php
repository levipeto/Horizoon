<!DOCTYPE html>
<html lang="en">
@include('panel.layouts.head')
<body>

  <div class="flex w-full overflow-hidden adaptable:block">

    @include('panel.layouts.navbar')

    <div class="float-right w-full h-screen adaptable:w-full bg-gray-100 overflow-y-scroll">

       {{-- Overview --}}
        <div class="w-full p-8 overflow-hidden">
           <div class="text-3xl font-bold text-gray-800">Dashboard Overview</div>

           <div class="flex space-x-3 pl-4 adaptable:pl-0 mt-6 w-full adaptable:block adaptable:space-x-0 adaptable:bg-transparent
           adaptable:shadow-none adaptable:space-y-3 adaptable:gap-4 bg-white rounded-sm shadow-2xl overflow-hidden">
               {{-- Users count --}}
                <div class="flex-1 h-full w-52 p-4 adaptable:bg-white adaptable:rounded-sm adaptable:shadow-sm adaptable:w-full">
                  <div class="flex space-x-2 gap-2">
                    <div class="mt-2 h-12 w-12 rounded-full bg-yellow-400">
                      <div class="justify-center items-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" viewBox="0 0 20 20" fill="currentColor">
                          <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                      </div>
                    </div>
                   <div class="block">
                      <div class="text-gray-700 font-semibold text-xl pt-1">
                        Users subscribes
                      </div>
                      <div class="text-xl font-bold text-gray-700">
                        @if ($users->count() > 0)
                        +{{$users->count()}}
                        @else 
                        {{$users->count()}}
                        @endif
                      </div>
                   </div>
                  </div>
                </div>

                <div class="flex-1 h-full w-52 p-4 adaptable:bg-white adaptable:rounded-sm adaptable:shadow-sm adaptable:w-full">
                  <div class="flex space-x-2 gap-2">
                    <div class="mt-2 h-12 w-12 rounded-full bg-purple-400">
                      <div class="justify-center items-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                      </div>
                    </div>
                   <div class="block">
                      <div class="text-gray-700 font-semibold text-xl pt-1">Shopping</div>
                      <div class="text-xl font-bold text-gray-700">
                        @if ($orders->count() > 0)
                        +{{$orders->count()}}
                        @else 
                        {{$orders->count()}}
                        @endif
                      </div>
                   </div>
                  </div>
                </div>

                <div class="flex-1 h-full w-52 p-4 adaptable:bg-white adaptable:rounded-sm adaptable:shadow-sm adaptable:w-full">
                  <div class="flex space-x-2 gap-2">
                    <div class="mt-2 h-12 w-12 rounded-full bg-green-400">
                      <div class="justify-center items-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                      </div>
                    </div>
                   <div class="block">
                      <div class="text-gray-700 font-semibold text-xl pt-1">Capital gains</div>
                      <div class="text-xl font-bold text-gray-700">
                        +€{{$capital}}
                      </div>
                   </div>
                  </div>
                </div>
           </div>

           {{-- Products --}}
           <div class="block pl-4 mt-12 w-full adaptable:bg-white bg-white rounded-sm shadow-2xl p-2">

            <div class="float-right pr-6 pt-3">
              <button class="w-40 p-2 bg-yellow-400 shadow-md text-base adaptable:hidden text-gray-900 rounded-sm font-semibold" id="hide-content">
                <a href="{{ route('add_products')}}">Add product</a>
              </button>
              <a class="shadow-sm lg:hidden large:hidden 2xl:hidden xl:hidden md:hidden" href="{{ route('add_products')}}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 rounded-full bg-yellow-400 p-2.5 shadow-2xl" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
              </a>
            </div>

            <div class="font-semibold text-gray-800 text-2xl p-4 adaptable:text-xl adaptable:w-full" >All products</div>

             {{-- Products table --}}
              <div class="flex flex-col pr-4 overflow-hidden">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Product
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Order
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Stock
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">       
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          @foreach ($products as $product)
                          <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="flex items-center">
                                @php
                                $images = json_decode($product->image,true);
                                @endphp
                                @if (count($images) > 0)    
                                <div class="flex-shrink-0 w-16 h-16">
                                  <img class="product-image bottom-0 w-full h-full" src="{{ Storage::url($images[array_key_first($images)]) }}">
                                </div>
                                @else
                                <div class="flex-shrink-0 w-16 h-16">
                                  <img class="product-image bottom-0 w-full h-full" alt="img no present">
                                </div>
                                @endif
                                <div class="ml-4">
                                  <div class="text-sm font-medium text-gray-900">
                                  </div>
                                  <div class="text-sm text-gray-500">
                                   <a href="{{ route('product.show',  $product->name)}}">{{$product->name}}</a>
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-900">5 order</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                             {{"€".number_format($product->price,2,'.','')}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              @if ($product->stock_qnt > 0)
                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{$product->stock_qnt}} in stock
                              </span>
                              @endif
                              @if ($product->stock_qnt <= 0)
                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-600">
                                {{$product->stock_qnt}} in stock
                              </span>
                              @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                              <div class="flex gap-4">
                                <a href="{{ route('update.product', $product->id) }}" class="text-indigo-500 font-semibold text-base cursor-pointer">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500 hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                  </svg>
                                </a>
                                 <form action="{{ route('delete.product', $product->id) }}" method="POST">
                                  @csrf
                                  <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 hover:text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                  </button>
                                 </form>
                              </div>
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