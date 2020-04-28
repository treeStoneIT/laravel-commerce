<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;


class AdminCategoryEdit extends Component
{
    public $category, $name, $description, $featuredImg, $featuredImgOld;

    protected $listeners = ['updatePhoto'];

    public function mount(Category $category)
    {
        $this->category       = $category;
        $this->name           = $category->name;
        $this->description    = $category->description;

        $this->featuredImgOld = $category->getMedia('category-featured')
                                        ->first()
                                        ->getUrl('thumb');
    }

    public function render()
    {
        return view('livewire.admin-category-edit');
    }

    public function validateForm()
    {
        $this->validate([
            'name'        => 'required',
            'description' => 'required',
            'featuredImg' => 'nullable',
        ]);
    }

    public function saveCategory()
    {
        $this->validateForm();

        $this->category->update([
            'name'        => $this->name,
            'description' => $this->description,
        ]);

        //change image
        if ($this->featuredImg) {
            $this->category->getFirstMedia('category-featured')->delete();

            $this->category
                ->addMediaFromDisk($this->featuredImg, 'public')
                ->preservingOriginal()
                ->toMediaCollection('category-featured');

            Storage::disk('public')->delete($this->featuredImg);
        }

        session()->flash('success', 'Category updated successfully');

        redirect()->route('admin.category.show', $this->category->id);
    }

    public function updatePhoto($imagePath)
    {
        $this->featuredImg = $imagePath;
    }
}
