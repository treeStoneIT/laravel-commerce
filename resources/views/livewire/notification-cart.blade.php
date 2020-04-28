<div class="fixed flex inset-0 items-end justify-center pointer-events-none px-4 py-6 sm:items-start sm:justify-end sm:p-6">
    <div x-data="{ show: {{$notificationOpen}} }"
         x-cloak
         x-show="show"
         x-init="setTimeout(() => @this.set('notificationOpen', 'false'),10000)"
         x-description="Notification panel, show/hide based on alert state."
         x-transition:enter="transform ease-out duration-300 transition"
         x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
         x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto">
        <div class="flex rounded-lg shadow-xs">
            <div class="w-0 flex-1 p-4">
                <div class="flex items-start">
                    <div class="ml-3 w-0 flex-1">
                        <p class="text-sm leading-5 font-medium text-gray-900">
                            Product was added to cart
                        </p>
                        <p class="mt-1 text-sm leading-5 text-gray-500">
                            {!! $notificationText !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex border-l border-gray-200">
                <a href="{{route('cart')}}" class="-ml-px flex items-center justify-center w-full border border-transparent rounded-r-lg p-4 text-sm leading-5 font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-indigo-700 active:bg-gray-50 transition ease-in-out duration-150">
                    Checkout
                </a>
            </div>
        </div>
    </div>
</div>
