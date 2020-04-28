<?php

namespace App\Http\Livewire;

use App\Category;
use App\Product;
use App\Unit;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class AdminProductEdit extends Component
{
    public $product, $name, $sku, $category, $description, $price, $unit, $featuredImg, $featuredImgOld;
    public $categories, $units;

    protected $listeners = ['updatePhoto'];

    public function mount(Product $product)
    {
        $this->product        = $product;
        $this->name           = $product->name;
        $this->sku            = $product->sku;
        $this->description    = $product->description;
        $this->category       = $product->category_id;
        $this->price          = $product->price;
        $this->unit           = $product->unit_id;
        $this->featuredImgOld = $product->getMedia('product-featured')
                                        ->first()
                                        ->getUrl('thumb');

        $this->categories = Category::all(['id', 'name'])
                                    ->pluck('name', 'id')
                                    ->toArray();

        $this->units = Unit::all(['id', 'label'])
                           ->pluck('label', 'id')
                           ->toArray();
    }

    public function render()
    {
        return view('livewire.admin-product-edit');
    }

    public function validateForm()
    {
        $this->validate([
            'name'        => 'required',
            'sku'         => 'required',
            'description' => 'required',
            'price'       => 'required',
            'unit'        => 'required|int',
            'category'    => 'required|int',
            'featuredImg' => 'nullable',
        ]);
    }

    public function saveProduct()
    {
        $this->validateForm();

        $this->product->update([
            'category_id' => $this->category,
            'name'        => $this->name,
            'sku'         => $this->sku,
            'description' => $this->description,
            'price'       => $this->price,
            'unit_id'     => $this->unit,
        ]);

        //change image
        if ($this->featuredImg) {
            $this->product->getFirstMedia('product-featured')->delete();

            $this->product
                ->addMediaFromDisk($this->featuredImg, 'public')
                ->preservingOriginal()
                ->toMediaCollection('product-featured');

            Storage::disk('public')->delete($this->featuredImg);
        }

        session()->flash('success', 'Product updated successfully');

        redirect()->route('admin.product.show', $this->product->id);
    }

    public function updatePhoto($imagePath)
    {
        $this->featuredImg = $imagePath;
    }
}
