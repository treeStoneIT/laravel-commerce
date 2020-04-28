<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProducts extends Component
{
    use WithPagination;

    public $search = '';
    public $page = 1;
    public $deleteModalOpen = 'false';
    public $deleteModalModelId;
    public $deleteModalTitle = 'Delete Product';
    public $deleteModalText = 'Are you sure you want to delete this product? The data will be permanently removed from our server. This action cannot be undone.';

    protected $updatesQueryString = [
        'search' => ['except' => ''],
        'page'   => ['except' => 1],
    ];

    public function mount()
    {
        $this->fill(request()->only('search', 'page'));
    }

    public function render()
    {
        $pQuery = Product::with('category', 'unit');

        if ( ! $this->search == '') {
            $pQuery = $pQuery->where('name', 'like', '%' . $this->search . '%')
                             ->orWhere('description', 'like', '%' . $this->search . '%');
        }

        return view('livewire.admin-products', [
            'products' => $pQuery->paginate(50),
        ]);
    }

    public function paginationView()
    {
        return 'admin.pagination-links-view';
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

    public function updatedSearch()
    {
        $this->gotoPage(1);
    }
}
