<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.categories.index');
    }


    /**
     * @param \App\Category $category
     *
     * @return \Illuminate\View\View
     */
    public function show(Category $category)
    {
        $category->load('products','media');
        return view('admin.categories.show',compact('category'));
    }

    /**
     * @param \App\Category $category
     *
     * @return \Illuminate\View\View
     */
    public function edit(Category $category)
    {
        $category->load('products');
        return view('admin.categories.edit', compact('category'));
    }

    /***
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }
}
