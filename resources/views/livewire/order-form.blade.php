<div class="px-4 mt-8 sm:px-0 @unless($cartContentCount) hidden @endif">
    <h3 class="text-lg font-medium leading-6 text-red-700 text-center mb-4">
        ~ Order Form ~
    </h3>
    <div class="bg-gray-50 overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <div>
                <div class="mt-1 rounded-md shadow-sm">
                    <div class="mb-3">
                        <select id="delivery_method" name="delivery_method"
                                wire:model="delivery_method"
                                wire:change="$set('delivery_method', $event.target.value)"
                                class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @foreach($deliveryMethodOptions as $deliveryMethodkey => $deliveryMethodOption)
                                <option value="{{$deliveryMethodkey}}">{{$deliveryMethodOption}}</option>
                            @endforeach
                        </select>
                        @error('delivery_method')
                        <div class="text-red-700 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <input required placeholder="Name"
                               wire:model="name"
                               wire:change="$set('name', $event.target.value)"
                               id="name" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @error('name')
                        <div class="text-red-700 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <input required type="tel" placeholder="555-555-5555"
                               wire:model="tel" wire:change="$set('tel', $event.target.value)"
                               id="tel" name="tel" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @error('tel')
                        <div class="text-red-700 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <input required type="email" placeholder="john@smith.com"
                               wire:model="email" wire:change="$set('email', $event.target.value)"
                               id="email" name="email" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @error('email')
                        <div class="text-red-700 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-3">
                        <div class="rounded-md shadow-sm">
                            <textarea required
                                      wire:model="address"
                                      wire:change="$set('address', $event.target.value)"
                                      id="address" name="address" rows="2" class="form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="333 Niagara Street, Toronto, Ontario"></textarea>
                            @error('address')
                            <div class="text-red-700 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="rounded-md shadow-sm">
                            <textarea
                                wire:model="comments"
                                wire:change="$set('comments', $event.target.value)"
                                id="comments" name="comments" rows="2" class="form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="order comments"></textarea>
                            @error('comments')
                            <div class="text-red-700 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4">
                        <button wire:click="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
