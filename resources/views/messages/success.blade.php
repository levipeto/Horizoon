<div class="success-msg mx-auto w-72 absolute right-0 mr-24 z-10 bg-gray-700 border-l-4 border-green-400 rounded-sm p-4 opacity-100
transform duration-150 ease-in" role="alert">
       <p class="font-bold text-white">Success</p>
       <p class="text-base font-normal text-gray-50">{{Session::get('success')}}!</p>
 </div>
 <script>
       const msg = document.querySelector('.success-msg');
       setTimeout(() => {
          msg.classList.add('active');
       }, 2000);
</script>