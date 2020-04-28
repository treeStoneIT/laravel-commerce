<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class AdminProductShow extends Component
{
    public $product;
    public $deleteModalOpen = 'false';
    public $deleteModalModelId;
    public $deleteModalTitle = 'Delete Product';
    public $deleteModalText = 'Are you sure you want to delete this product? The data will be permanently removed from our server. This action cannot be undone.';

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->deleteModalTitle = 'Delete Product: <em>'. $product->name. '</em>';
    }

    public function render()
    {
        return view('livewire.admin-product-show');
    }

    public function deleteConfirm($product_id){
        $this->deleteModalOpen = 'true';
        $this->deleteModalModelId = $product_id;
    }

    public function hideModal(){
        $this->deleteModalOpen = 'false';
        $this->deleteModalModelId = null;
    }

    public function delete($product_id)
    {
        $product = Product::find($product_id);
        $product->delete();
        session()->flash('success', 'Product deleted successfully');
        redirect()->route('admin.products');
    }
}
