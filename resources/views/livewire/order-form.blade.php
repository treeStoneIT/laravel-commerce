<div class="mt-8 @unless($cartContentCount) hidden @endif">
    <h3 class="text-lg font-medium leading-6 text-red-700 text-center mb-4">
        ~ Order Form ~
    </h3>
    <div class="bg-gray-50 overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <div>
                <div class="mt-1 rounded-md shadow-sm">
                    <div class="mb-3">
                        <select id="delivery_method" name="delivery_method"
                                wire:model.lazy="delivery_method"
                                class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @foreach($deliveryMethodOptions as $deliveryMethodkey => $deliveryMethodOption)
                                <option value="{{$deliveryMethodkey}}">{{$deliveryMethodOption}}</option>
                            @endforeach
                        </select>
                        @error('delivery_method')
                        <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input required placeholder="Name"
                               wire:model.lazy="name"
                               id="name" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @error('name')
                        <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input required type="tel" placeholder="555-555-5555"
                               wire:model.lazy="tel"
                               id="tel" name="tel" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @error('tel')
                        <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input required type="email" placeholder="john@smith.com"
                               wire:model.lazy="email"
                               id="email" name="email" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        @error('email')
                        <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="rounded-md shadow-sm">
                            <textarea required
                                      wire:model.lazy="address"
                                      id="address" name="address" rows="2" class="form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="333 Niagara Street, Toronto, Ontario"></textarea>
                            @error('address')
                            <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="rounded-md shadow-sm">
                            <textarea
                                wire:model.lazy="comments"
                                id="comments" name="comments" rows="2" class="form-textarea mt-1 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="order comments"></textarea>
                            @error('comments')
                            <div class="text-red-700 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-4">
                        <button wire:click="store" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript" defer>
        document.addEventListener('DOMContentLoaded', function () {
            var stripe = Stripe('{{config('services.stripe.pk')}}');
            window.livewire.on('stripe-payment', stripeSessionID => {
                stripe.redirectToCheckout({
                    // Make the id field from the Checkout Session creation API response
                    // available to this file, so you can provide it as parameter here
                    // instead of the CHECKOUT_SESSION_ID placeholder.
                    sessionId: stripeSessionID
                }).then(function (result) {
                    // If `redirectToCheckout` fails due to a browser or network
                    // error, display the localized error message to your customer
                    // using `result.error.message`.
                });
                // alert(stripeSessionID);
                // or whatever alerting library you'd like to use
            })
        })
    </script>
@endpush
