<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminCategoryCreate extends Component
{
    public $name, $description, $featuredImg;

    protected $listeners = ['updatePhoto'];

    public function render()
    {
        return view('livewire.admin-category-create');
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

        $category = Category::create([
            'name'        => $this->name,
            'slug'        => Str::slug($this->name),
            'description' => $this->description,
        ]);

        $category
            ->addMediaFromDisk($this->featuredImg,'public')
            ->preservingOriginal()
            ->toMediaCollection('category-featured');

        Storage::disk('public')->delete($this->featuredImg);

        session()->flash('success', 'Category created successfully');

        redirect()->route('admin.category.show',$category->id);
    }

    public function updatePhoto($imagePath)
    {
        $this->featuredImg = $imagePath;
    }
}
