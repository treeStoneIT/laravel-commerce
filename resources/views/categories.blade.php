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
    <div class="relative bg-gray-50 pt-12 pb-20 px-4 sm:px-6 lg:px-8">
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3"></div>
        </div>
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl leading-9 tracking-tight font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
                    Online Order
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl leading-7 text-gray-500 sm:mt-4">
                    Delivery time between 12 p.m. to 5 p.m. only in North York <br>
                    ($ 10.00 Delivery Charges for all orders).
                </p>
            </div>
            <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-4 lg:max-w-none">
                @foreach($categories as $category)
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <a href="{{ route('category.by-slug',$category->slug) }}" class="block">
                        <img class="h-48 w-full object-cover"
                             src="{{$category->getFirstMediaUrl('category-featured', 'thumb')}}"
                             alt="{{$category->name}}" />
                        </a>
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <a href="{{ route('category.by-slug',$category->slug) }}"
                               class="block">
                                <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
                                    {{$category->name}}
                                </h3>
                                <p class="mt-3 text-base leading-6 text-gray-500">
                                    {{$category->description}}
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
