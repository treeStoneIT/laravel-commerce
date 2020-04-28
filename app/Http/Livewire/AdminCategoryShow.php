<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;

class AdminCategoryShow extends Component
{
    public $category;
    public $deleteModalOpen = 'false';
    public $deleteModalModelId;
    public $deleteModalTitle = 'Delete Category';
    public $deleteModalText = 'Are you sure you want to delete this category? The data will be permanently removed from our server. This action cannot be undone.';

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->deleteModalTitle = 'Delete Category: <em>'. $category->name. '</em>';
    }

    public function render()
    {
        return view('livewire.admin-category-show');
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
