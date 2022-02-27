<div class="w-full h-full overflow-auto p-4 adaptable:p-0">
          <div class="pt-6 pl-4 adaptable:pl-2">
            <div class="text-gray-800 font-bold text-xl pl-2">My Account</div>
            <div class="mt-4">
              <ul class="max-w-2xl">

                 {{-- Image --}}
                 <li class="flex p-4 border-b">
                  <form class="flex w-full adaptable:block" action="{{route('account.update.image')}}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PATCH')
                   <div class="flex space-x-2 adaptable:space-x-0 adaptable:max-w-2xl gap-1">
                      @if(Auth::user()->image == null)
                        <img class="profile-image-btn rounded-full adaptable:mx-auto adaptable:h-24 adaptable:w-24 w-36 h-36 justify-center items-center overflow-hidden object-cover cursor-pointer" id="preview-img" src="{{URL::to('/')}}/images/avatar.png">
                      @else
                        <img class="profile-image-btn rounded-full adaptable:mx-auto adaptable:h-24 adaptable:w-24 w-36 h-36 justify-center items-center overflow-hidden object-cover cursor-pointer" id="preview-img" src="{{ Storage::url(Auth::user()->image) }}">
                      @endif
                    </div>
                    <div class="block space-y-2 pl-4 adaptable:mt-4">
                        <div class="text-base font-semibold text-gray-800">Upload your photo</div>
                        <div class="text-sm font-semibold text-gray-600">let the world know who you are through an image</div>
                        <div class="flex space-x-2 w-full ml-auto adaptable:pr-6 adaptable:w-40"> 
                        {{-- Input file --}}
                        <label for="upload-photo" id="upload-photo-btn" class="cursor-pointer w-full">
                          <input type="file" class="hidden" name="profile_image" id="upload-photo"> 
                          <div class="px-1 py-1 adaptable:w-full adaptable:left-0 w-44 mobile:w-full bg-gray-200 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md text-center">Choose photo</div>
                        </label>
                        {{-- Btn --}}
                         <div class="flex gap-2">
                          <button type="submit" class="ml-auto px-1 py-1 h-8 adaptable:w-full w-32 mobile:w-full bg-gray-300 hover:bg-gray-400 text-gray-900 rounded-sm font-semibold text-base shadow-md" id="confirm-photo-btn"
                          style="display: none;">Upload</button>
                          <button  class="ml-auto px-1 py-1 h-8 adaptable:w-full w-32 mobile:w-full bg-red-500 hover:bg-red-600 text-white rounded-sm font-semibold text-base shadow-md" id="cancel-photo-btn"
                          style="display: none;">Cancel</button>
                         </div>
                        </div>
                    </div>
                  </form> 
                  {{-- Delete image --}}
                  @if(Auth::user()->image != null)
                  <form action="{{route('account.delete.image')}}" method="POST">
                    @csrf
                   @method('PATCH')
                    <button class="rounded-full p-1.5 cursor-pointer bg-red-500 w-10 h-10 shadow-md text-white overflow-hidden hover:opacity-90">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 object-cover object-center" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                      </svg>
                    </button> 
                  </form>
                  @endauth
                 </li>

                {{-- Name --}}
                <li class="flex p-4 border-b">
                 <form class="flex adaptable:block w-full" action="{{route('account.update.data')}}" method="POST">
                  @csrf
                  @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="fullname">Name</label>
                     <div>
                        <input class="text-gray-600 w-60 adaptable:w-full adaptable:p-1 text-base outline-none border rounded-sm p-1 focus:border-blue-300" 
                        name="fullname" value="{{Auth::user()->fullname}}">
                     </div>
                  </div>
                  <div class="ml-auto adaptable:ml-0 adaptable:w-full pt-6 adaptable:pr-6">
                  <button type="submit" class="px-1.5 py-1.5 adaptable:w-full w-44 mobile:w-full bg-gray-200 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                  </div>
                 </form>
                </li>

                {{-- Email --}}
                <li class="flex p-4 border-b">
                  <form class="flex adaptable:block w-full" action="{{route('account.update.data')}}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="email">Email</label>
                     <div>
                      <input class="text-gray-600 text-base w-60 adaptable:w-full adaptable:p-1 outline-none border rounded-sm p-1 focus:border-blue-300" 
                      name="email" value="{{Auth::user()->email}}">
                     </div>
                  </div>
                 <div class="ml-auto adaptable:ml-0 pt-6 adaptable:pr-6 adaptable:w-full">
                  <button class="px-1.5 py-1.5 adaptable:w-full w-44 mobile:w-full bg-gray-200 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                 </div>
                  </form>
                </li>

                {{-- Address --}}
                <li class="flex p-4 border-b">
                  <form class="flex adaptable:block w-full" action="{{route('account.update.data')}}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="address">Address</label>
                     <div>
                      <input class="text-gray-600 text-base w-60 adaptable:w-full adaptable:p-1 outline-none border rounded-sm p-1 focus:border-blue-300" 
                      name="address" value="{{Auth::user()->address}}">
                     </div>
                  </div>
                 <div class="ml-auto pt-6 adaptable:ml-0 adaptable:w-full adaptable:pr-6">
                  <button class="px-1.5 py-1.5 adaptable:w-full w-44 mobile:w-full bg-gray-200 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                 </div>
                  </form>
                </li>

                {{-- City --}}
                <li class="flex p-4 border-b">
                  <form class="flex adaptable:block w-full" action="{{route('account.update.data')}}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="city">City</label>
                     <div class="text-gray-600 text-base">
                      <input class="text-gray-600 text-base w-60 adaptable:w-full adaptable:p-1 outline-none border rounded-sm p-1 focus:border-blue-300" 
                      name="city" value="{{Auth::user()->city}}">
                     </div>
                  </div>
                 <div class="ml-auto pt-6 adaptable:pr-6 adaptable:ml-0 adaptable:w-full">
                  <button class="px-1.5 py-1.5 adaptable:w-full w-44 mobile:w-full bg-gray-200 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                 </div>
                  </form>
                </li>

                {{-- Phone --}}
                <li class="flex p-4 border-b">
                  <form class="flex adaptable:block w-full" action="{{route('account.update.data')}}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="phone">Phone</label>
                     <div class="text-gray-600 text-base">
                      <input class="text-gray-600 text-base w-60 adaptable:w-full adaptable:p-1 outline-none border rounded-sm p-1 focus:border-blue-300" 
                      name="phone" value="{{Auth::user()->phone}}">
                     </div>
                  </div>
                 <div class="ml-auto pt-6 adaptable:pr-6 adaptable:ml-0 adaptable:w-full">
                  <button class="px-1.5 py-1.5 adaptable:w-full w-44 mobile:w-full bg-gray-200 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                 </div>
                  </form>
                </li>

                {{-- Password --}}
                <li class="flex p-4 border-b">
                  <form class="flex w-full" action="{{route('account.update.password')}}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="block space-y-2 gap-1">
                     <label class="text-base font-semibold text-gray-800" for="phone">Password</label>
                     <div class="space-y-4 gap-2">
                      <input class="text-gray-600 text-base w-60 adaptable:w-full adaptable:p-1 outline-none border rounded-sm p-1 focus:border-blue-300" 
                      type="password" name="current_password" autocomplete required placeholder="Current Password...">
                      <input class="text-gray-600 text-base w-60 adaptable:w-full adaptable:p-1 outline-none border rounded-sm p-1 focus:border-blue-300" 
                      type="password" name="password" required placeholder="New Password...">
                      <input class="text-gray-600 text-base w-60 adaptable:w-full adaptable:p-1 outline-none border rounded-sm p-1 focus:border-blue-300" 
                      type="password" name="confirm_password" required placeholder="Repeat Password...">
                      <div>
                        <a href="{{route('password.request')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                          Forgot your password?
                        </a>
                      </div>
                      <div class="ml-auto pt-2 w-full 2xl:hidden xl:hidden lg:hidden">
                        <button class="px-1.5 py-1.5 w-full bg-gray-200 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit</button>
                       </div>
                     </div>
                  </div>
                 <div class="ml-auto pt-6 adaptable:hidden mobile:hidden">
                  <button class="px-1.5 py-1.5 w-44 bg-gray-200 hover:bg-yellow-400 text-gray-900 rounded-sm font-semibold text-base shadow-md">Edit password</button>
                 </div>
                  </form>
                </li>

              </ul>
            </div>
          </div>

          {{-- Profile image viewer --}}
          @if (!Auth::user()->image == null)
          <div class="profile-image-container w-full h-screen hidden">
            <div class="h-full w-full overlay fixed z-10 left-0 right-0 bottom-0 overflow-auto" style="background-color:rgba(0, 0, 0, 0.644);">
             <div class="max-w-6xl adaptable:w-80 adaptable:h-80 adaptable:mt-52 adaptable:rounded-sm bottom-0 z-10 mx-auto mt-8 overflow-hidden">
               <img class="w-full h-full object-cover" id="show-img" src="{{ Storage::url(Auth::user()->image) }}">
             </div>
            </div>
           </div>
          @endif

          <script src="{{ asset('js/profile.js') }}"></script>
      
</div>   