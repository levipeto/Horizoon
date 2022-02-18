
<div class="w-full overflow-hidden pb-12">

        <div class="max-w-5xl adaptable:w-full mx-auto bg-white rounded-sm mt-12 p-2 overflow-y-scroll">
            <div class="font-semibold text-gray-800 text-2xl p-4">Subscribes</div>
            <div class="flex flex-col pr-4">
              <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8 overflow-hidden">
                  <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg ">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           User
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Name
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           City
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Address
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Phone
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Verfied
                          </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                           Admin
                           </th>
                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">     
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                        <tr>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                              <div class="flex-shrink-0 w-10 h-10">
                                @if($user->image == null)
                                <button class="flex-1 rounded-full w-10 h-10 bg-yellow-400 justify-center items-center
                                text-gray-800 font-semibold text-2xl">
                                @php
                                $first_letter = substr($user->fullname, 0, 1);
                                @endphp
                                {{ $first_letter}}
                                </button>
                              @else
                                  <img class="rounded-full w-10 h-10 justify-center items-center overflow-hidden object-cover" src="{{ Storage::url($user->image) }}">
                              @endif
                              </div>
                              <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                </div>
                                <div class="text-sm text-gray-500">
                                 <a href="">{{$user->email}}</a>
                                </div>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$user->fullname}}</div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$user->city}}</div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$user->address}}</div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="text-sm text-gray-900">+{{$user->phone}}</div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($user->email_verified_at == true)
                             <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Verified
                             </span>  
                            @else
                              <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                              Pending
                              </span> 
                            @endif
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($user->is_admin == true)
                             <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              yes
                             </span>  
                            @else
                              <span class="px-4 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                              no
                              </span> 
                            @endif
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="" class="text-indigo-500 font-semibold text-base cursor-pointer">
                              action
                            </a>
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

 
