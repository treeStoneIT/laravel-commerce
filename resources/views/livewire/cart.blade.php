<div class="px-4 sm:px-0">
    <h3 class="text-lg font-medium leading-6 text-red-700 text-center mb-4">
        ~ Order Details ~
    </h3>
    <div class="flex flex-col shadow-lg">
        <div class="-my-2 py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <table class="min-w-full">
                    <thead>
                    <tr>
                        <th class="px-4 py-2 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Item Name
                        </th>
                        <th class="px-4 py-2 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider text-center">
                            Qty
                        </th>
                        <th class="px-4 py-2 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider text-center">
                            Unit Price
                        </th>
                        <th class="px-4 py-2 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider text-center">
                            Total Price
                        </th>
                        <th class="px-4 py-2 border-b border-gray-200 bg-gray-100"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($cartContent as $item)
                        <livewire:cart-item :item="$item" :even="$loop->even" :key="Str::random(10)"/>
                    @empty
                        @include('cart-empty')
                    @endforelse
                    </tbody>
                    @if($cartContent->count())
                        <tfoot>
                        <tr>
                            <th colspan="3" class="px-4 py-2 border-b border-gray-300 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Subtotal
                            </th>
                            <th colspan="2" class="px-4 py-2 border-b border-gray-300 bg-gray-100 text-left text-xs leading-4 font-bold text-gray-700 uppercase tracking-wider text-right">
                                ${{$cartSubtotal}}
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3" class="px-4 py-2 border-b border-gray-300 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Tax (HST)
                            </th>
                            <th colspan="2" class="px-4 py-2 border-b border-gray-300 bg-gray-100 text-left text-xs leading-4 font-bold text-gray-700 uppercase tracking-wider text-right">
                                ${{$cartTax}}
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3" class="px-4 py-2 border-b border-gray-300 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Total
                            </th>
                            <th colspan="2" class="px-4 py-2 border-b border-gray-300 bg-gray-100 text-left text-xs leading-4 font-bold text-gray-700 uppercase tracking-wider text-right">
                                ${{ $cartTotal }}
                            </th>
                        </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>

<livewire:order-form/>
