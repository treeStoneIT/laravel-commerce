@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <div class="relative pt-12 pb-20 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center mb-4">
                <h2 class="text-3xl leading-9 tracking-tight font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
                    Online Order
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl leading-7 text-gray-500 sm:mt-4">
                    Delivery time between 12 p.m. to 5 p.m. only in North York <br>
                    ($ 10.00 Delivery Charges for all orders).
                </p>
            </div>
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="mt-5 md:col-span-2 md:mt-8">
                    <livewire:cart/>
                </div>
                <div class="md:col-span-1">
                    <livewire:order-form/>
                </div>
            </div>
        </div>
    </div>
@endsection
