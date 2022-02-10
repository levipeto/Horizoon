<!DOCTYPE html>
<html lang="en">
@include('panel.layouts.head')
<style>
.success-msg {
    transition: opacity 0.5s ease-out;
    opacity: 1;
}
.success-msg.active {
    opacity: 0;
    display: block;
}
</style>
<body>

  <div class="flex w-full overflow-hidden adaptable:block">

    @include('panel.layouts.navbar')

    <div class="float-right w-full h-screen adaptable:w-full bg-gray-100 overflow-y-scroll">

    {{-- Show success message --}}
    @if (Session::has('success'))
    <div class="mt-4">
     @include('messages.success')
    </div>
    @endif

      <div class="px-4 py-5 sm:px-6">
        <form action="{{route('store-product')}}" method="POST" enctype="multipart/form-data">
         <div class="float-right pt-2">
           <button class="w-40 bg-yellow-400 text-base text-gray-800 font-semibold p-2 hover:bg-yellow-300 rounded-sm">Save</button>
          </div>
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          Add products
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
          upload your products to e-commerce
        </p>
      </div>
      <div class="border-t border-gray-200">
          @csrf
        <dl>
          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium ">
              Name
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input class="bg-transparent outline-none" type="text" name="product-name" id="" placeholder="product name...">
            </dd>
          </div>

          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              On Sale
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <select class="w-60 rounded-sm outline-none" name="product-sale">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
            </dd>
          </div>

          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              Category
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <select class="w-60 rounded-sm outline-none" name="product-category">
                <option value="smartphone">smartphone</option>
                <option value="headphones">headphones</option>
                <option value="accessories">accessories</option>
                <option value="computers">computer</option>
                <option value="tv">tv</option>
                <option value="videogames">videogames</option>
              </select>
            </dd>
          </div>

          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              Price
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input class="bg-transparent outline-none" type="number" name="product-price" id="" placeholder="product price...">
            </dd>
          </div>
          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
              Quantity
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <input class="bg-transparent outline-none" type="number" name="product-quantity" min="0" max="100" placeholder="quanitiy">
            </dd>
          </div>
          <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
             Description
            </dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <textarea class="bg-transparent outline-none w-full border border-gray-300 p-1" name="product-description"></textarea>
            </dd>
          </div>
  
          {{-- Images upload --}}
          <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500">
             Images
            </dt>
            <dd class="block mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                 <input type="file" name="product-image[]" multiple>
            </dd>
          </div>
  
        </dl>
        </form>
      </div>
  
    <script src="{{ asset('js/uploadimages.js') }}"></script>
  
    </div>

  </div>

 
</body>
</html>