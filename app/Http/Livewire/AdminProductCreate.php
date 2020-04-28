<?php

namespace App\Http\Livewire;

use App\Category;
use App\Unit;
use App\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class AdminProductCreate extends Component
{
    public $name, $sku, $category, $description, $price, $featuredImg;
    public $unit = 1;
    public $categories, $units;

    protected $listeners = ['updatePhoto'];

    public function mount()
    {
        $this->categories = Category::all(['id', 'name'])
                                    ->pluck('name', 'id')
                                    ->toArray();

        $this->units = Unit::all(['id', 'label'])
                           ->pluck('label', 'id')
                           ->toArray();
    }

    public function validateForm()
    {
        $this->validate([
            'name'        => 'required',
            'sku'         => 'required',
            'description' => 'required',
            'price'       => 'required',
            'unit'        => 'required',
            'category'    => 'required',
            'featuredImg' => 'required',
        ]);
    }

    public function saveProduct()
    {
        $this->validateForm();

        $productModel = Product::create([
            'category_id' => $this->category,
            'name'        => $this->name,
            'sku'         => $this->sku,
            'description' => $this->description,
            'price'       => $this->price,
            'unit_id'     => $this->unit,
        ]);

        $productModel
            ->addMediaFromDisk($this->featuredImg,'public')
            ->preservingOriginal()
            ->toMediaCollection('product-featured');

        Storage::disk('public')->delete($this->featuredImg);

        session()->flash('success', 'Product created successfully');

        redirect()->route('admin.product.show',$productModel->id);
    }

    public function render()
    {
        return view('livewire.admin-product-create');
    }

    public function updatePhoto($imagePath)
    {
        $this->featuredImg = $imagePath;
    }
}
