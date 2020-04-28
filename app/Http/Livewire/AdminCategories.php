<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategories extends Component
{
    use WithPagination;

    public $search = '';
    public $page = 1;
    public $deleteModalOpen = 'false';
    public $deleteModalModelId;
    public $deleteModalTitle = 'Delete Category';
    public $deleteModalText = 'Are you sure you want to delete this category? The data will be permanently removed from our server. This action cannot be undone.';

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
        $cQuery = Category::withCount('products');

        if ( ! $this->search == '') {
            $cQuery = $cQuery->where('name', 'like', '%' . $this->search . '%')
                             ->orWhere('description', 'like', '%' . $this->search . '%');
        }

        return view('livewire.admin-categories', [
            'categories' => $cQuery->paginate(50),
        ]);
    }

    public function paginationView()
    {
        return 'admin.pagination-links-view';
    }

    public function deleteConfirm($category_id){
        $this->deleteModalOpen = 'true';
        $this->deleteModalModelId = $category_id;
    }

    public function hideModal(){
        $this->deleteModalOpen = 'false';
        $this->deleteModalModelId = null;
    }

    public function delete($category_id)
    {
        $category = Category::find($category_id);
        $category->delete();
        session()->flash('success', 'Category deleted successfully');
        redirect()->route('admin.categories');
    }

    public function updatedSearch()
    {
        $this->gotoPage(1);
    }
}
