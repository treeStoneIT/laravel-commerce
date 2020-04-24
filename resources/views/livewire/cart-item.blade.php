<tr class="{{ $even ? 'bg-gray-50':'bg-white' }}">
    <td class="px-2 py-2 text-sm leading-5 font-medium text-gray-900" title="{{$item->options['product_note']}}">
        {{$item->description}}
    </td>
    <td class="px-2 py-2 whitespace-no-wrap text-sm leading-5 text-gray-500 text-center">
        {{$item->quantity}} {{$item->buyable->unit->label}}
        <div class="mt-1 sm:mt-0">
            <div class="max-w-lg flex inline-flex rounded-md shadow-sm">
                <button wire:click="decreaseQty" class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                    -
                </button>
                <div class="border-r border-gray-300"></div>
                <button wire:click="increaseQty" class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                    +
                </button>
            </div>
        </div>
    </td>
    <td class="px-2 py-2 whitespace-no-wrap text-sm leading-5 text-gray-500 text-center">
        @money($item->price)
    </td>
    <td class="px-2 py-2 whitespace-no-wrap text-sm leading-5 text-gray-500 text-center">
        @money($item->subtotal)
    </td>
    <td class="px-2 py-2 whitespace-no-wrap text-right text-sm leading-5 font-medium text-center align-middle">
            <svg wire:click="removeItem" class="h-4 w-4 text-gray-400 hover:text-red-400 cursor-pointer" fill="currentColor" viewBox="0 0 20 20">
            <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/>
        </svg>
    </td>
</tr>
@if($item->options['product_note'])
    <tr class="{{ $even ? 'bg-gray-50':'bg-white' }}">
        <td colspan="5" class="px-2 pb-1 text-sm leading-5 font-medium">
            <div class="text-xs leading-5 text-gray-500">{{$item->options['product_note']}}</div>
        </td>
    </tr>
@endif
