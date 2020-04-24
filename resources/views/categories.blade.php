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
    <div class="bg-gray-700">
        <div class="max-w-screen-xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center">
            <div class="lg:w-0 lg:flex-1">
                <h2 class="text-3xl leading-9 font-extrabold tracking-tight text-white sm:text-4xl sm:leading-10">
                    Sign up for our newsletter
                </h2>
                <p class="mt-3 max-w-3xl text-lg leading-6 text-gray-300">
                    Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui Lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat.
                </p>
            </div>
            <div class="mt-8 lg:mt-0 lg:ml-8">
                <form class="sm:flex">
                    <input aria-label="Email address" type="email" required class="appearance-none w-full px-5 py-3 border border-transparent text-base leading-6 rounded-md text-gray-900 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 transition duration-150 ease-in-out sm:max-w-xs" placeholder="Enter your email" />
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                        <button class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-400 focus:outline-none focus:bg-indigo-400 transition duration-150 ease-in-out">
                            Notify me
                        </button>
                    </div>
                </form>
                <p class="mt-3 text-sm leading-5 text-gray-300">
                    We care about the protection of your data. Read our
                    <a href="#" class="text-white font-medium underline">
                        Privacy Policy.
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
