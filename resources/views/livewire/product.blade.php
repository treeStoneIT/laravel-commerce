<div class="lg:flex mb-6">
    <div class="border-r border-t border-l border-gray-200 lg:border-r-0 lg:border-b lg:border-gray-200 h-60 lg:h-auto lg:w-72 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('{{$product->getFirstMediaUrl('product-featured', 'thumb')}}')"
         title="{{$product->name}}">
    </div>
    <div class="border-r border-b border-l border-gray-200 lg:border-l-0 lg:border-t lg:border-gray-200  bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal flex-grow">
        <p class="text-gray-900 mb-0.5 leading-none text-lg text-red-500">{{$product->name}}</p>
        <p class="text-gray-400 mb-0.5 text-sm">
            SKU: <span class="text-gray-600">{{$product->sku}}</span>
        </p>
        <p>{{ $product->description }}</p>
        <div class="mt-4 sm:mt-3">
            <div class="grid grid-cols-3 gap-4 items-start border-t border-gray-200 pt-5">
                <div class="mt-1 sm:mt-0">
                    <div class="max-w-lg flex rounded-md shadow-sm">
                        <button wire:click="decreaseQty" {{$qty > 1 ? '': 'disabled'}}
                            class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm {{$qty > 1 ? '': 'opacity-50 cursor-not-allowed'}}">
                            -
                        </button>
                        <input id="{{$product->id}}-qty"
                               name="{{$product->id}}-qty"
                               type="number"
                               wire:model="qty"
                               min="1"
                               class="number-field-without-arrows flex-1 form-input block w-full rounded-none transition duration-150 ease-in-out sm:text-sm sm:leading-5 text-center"/>
                        <button
                            wire:click="increaseQty"
                            class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                            +
                        </button>
                    </div>
                </div>
                <p class="block text-sm font-medium leading-5 text-gray-700 mt-px pt-2">
                    {{$product->unit->label}}
                </p>
                <div class="block text-3xl font-bold font-medium leading-5 text-red-500 mt-px pt-2 text-right">
                    ${{ $product->price }}
                </div>
            </div>
        </div>
        <div class="mt-4 sm:mt-3 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="{{$product->id}}-note" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                Product Note
            </label>
            <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-lg flex rounded-md shadow-sm">
                    <textarea id="{{$product->id}}-note" name="{{$product->id}}-note" wire:model="note" rows="1" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                </div>
            </div>
        </div>
        <button wire:click="addToCart" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out mt-3">
            Add to Cart
        </button>
    </div>
</div>
