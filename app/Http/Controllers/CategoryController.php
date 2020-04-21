<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::with('media')->get();

        return view('categories', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showBySlug($slug)
    {
        $category = Category::whereSlug($slug)
                            ->with('media','products','products.unit','products.media')
                            ->first();

        return view('category-show', compact('category'));
    }
}
