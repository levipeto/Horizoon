<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <title>{{ config('app.name') }}@auth | {{Auth::user()->fullname}} shopping @endauth</title>
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>
<body>
@include('layouts.navbar')


<div class="overlay hidden"></div>

<section class="mx-auto mobile:max-w-xl max-w-4xl p-4 mt-6 rounded-xl bg-green-500
overflow-hidden">
    <div class="w-full p-4 mx-auto text-white text-3xl font-bold text-center mt-12 rounded-sm">
    you have no payment card! <a class="text-gray-600" href="{{ route('user_add_cart') }}">Add now</a>
    </div>
    <div class="max-w-xs h-full mx-auto mt-6 bg-green-400 p-8 rounded-full">
        <img width="240" height="240" src="{{ asset('images/pay-cart.svg') }}">
    </div>
</section>



</body>
</html>