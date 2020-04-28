<div>
    <div>
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Product
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                This information will be displayed publicly so be careful what you share.
            </p>
        </div>
        <div class="mt-6 sm:mt-5">
            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Product Name<span class="text-red-700">*</span>
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg rounded-md shadow-sm">
                        <input required wire:model="name" wire:change="$set('name', $event.target.value)"
                               id="name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    @error('name')
                    <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="sku" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    SKU<span class="text-red-700">*</span>
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg rounded-md shadow-sm">
                        <input required wire:model="sku" wire:change="$set('sku', $event.target.value)"
                               id="sku" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                    @error('sku')
                    <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="category" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Category
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-xs rounded-md shadow-sm">
                        <select wire:model="category" wire:change="$set('category', $event.target.value)"
                                required id="category" class="block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <option selected>~ Please Select a Category ~</option>
                            @foreach($categories as $categoryId => $categoryName)
                                <option value="{{$categoryId}}">{{$categoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category')
                    <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="description" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Description
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex rounded-md shadow-sm">
                        <textarea wire:model="description" wire:change="$set('description', $event.target.value)"
                                  id="description" rows="2" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Write a few sentences about the product.</p>
                    @error('description')
                    <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="price" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Price<span class="text-red-700">*</span>
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-xs mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <div class="text-gray-500 sm:text-sm sm:leading-5">
                                $
                            </div>
                        </div>
                        <input required id="price" type="number" step="0.01"
                               wire:model="price" wire:change="$set('price', $event.target.value)"
                               class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5" placeholder="0.00"/>
                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <select wire:model="unit" wire:change="$set('unit', $event.target.value)"
                                    aria-label="Unit" class="form-select h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm sm:leading-5">
                                @foreach($units as $unitId => $unitName)
                                    <option @if($loop->first) selected @endif value="{{$unitId}}">
                                        {{$unitName}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('price')
                    <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                    @enderror
                    @error('unit')
                    <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mt-6 sm:mt-5">

            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="featuredImg" class="block text-sm leading-5 font-medium text-gray-700">
                    Featured Image
                </label>
                <div class="mt-2 sm:mt-0">
                    <div class="flex items-center">
                        <div class="overflow-hidden relative w-64 mt-4 mb-4">
                            <button class="cursor-pointer text-white font-bold py-2 px-4 w-full inline-flex items-center py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                <svg fill="#000" height="18" viewBox="0 0 24 24" width="18"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                                </svg>
                                <span class="ml-2">Change Picture</span>
                            </button>
                            <input required class="cursor-pointer absolute block py-2 px-4 w-full opacity-0 inset-0"
                                   type="file" id="featuredImg"
                                   name="featuredImg"
                                   accept="image/*"
                            >
                        </div>
                    </div>
                    @error('featuredImg')
                    <div class="text-red-700 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <img class="w-full h-auto" src="{{$featuredImgOld}}" alt=""/>
            </div>
        </div>
    </div>
    <div class="mt-8 border-t border-gray-200 pt-5">
        <div class="flex justify-end">
            <div class="inline-flex rounded-md shadow-sm">
                <a href="{{ route('admin.products') }}" type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                    Cancel
                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow-sm">
                <button wire:click="saveProduct()" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    Update
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        let photoInput = document.getElementById('featuredImg');
        photoInput.addEventListener('input', () => {
            let photo = photoInput.files[0];
            let formData = new FormData();
            formData.append('photo', photo);

            axios.post('/admin/temp-image-upload',
                formData,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
            ).then(response => {
                let imagePath = response.data.imagePath;
                livewire.emit('updatePhoto', imagePath);
            })

        });
    </script>
@endpush
