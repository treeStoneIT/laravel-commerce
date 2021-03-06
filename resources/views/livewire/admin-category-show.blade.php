<div class="bg-white shadow overflow-hidden  sm:rounded-lg">
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6 md:flex md:items-center md:justify-between">
        <div class="flex-1 min-w-0">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Category Details
            </h3>
        </div>
        <div class="mt-4 flex-shrink-0 flex md:mt-0 md:ml-4">
            <div class="shadow-sm rounded-md">
                <a href="{{route('admin.category.edit',$category->id)}}" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                    Edit
                </a>
            </div>
            <div class="ml-3 shadow-sm rounded-md">
                @if($category->products->count() == 0)
                <button wire:click="deleteConfirm({{$category->id}})" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-700 active:bg-red-700 transition duration-150 ease-in-out">
                    Delete
                </button>
                @endif
            </div>
        </div>
    </div>
    <div class="px-4 py-5 sm:p-0">
        <dl>
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Name
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$category->name}}
                </dd>
            </div>
            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Category
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{$category->description}}
                </dd>
            </div>
            <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Featured Picture
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    <img class="w-full h-auto max-w-xs"
                         src="{{$category->getMedia('category-featured')->first()->getUrl('thumb')}}" alt=""/>
                </dd>
            </div>
        </dl>
    </div>
    @include('includes.delete-modal')
</div>
