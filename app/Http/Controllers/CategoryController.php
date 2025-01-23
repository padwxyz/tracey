<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Location;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::with('location')->get();
        $location = Location::all();
        $title = 'Category Management Data';
        return view('', compact('category', 'location', 'title'));
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->back()->with('Success', 'Category created successfully!');
    }

    public function update(Request $request, $id)
    {
        $Category = Category::findOrFail($id);
        $Category->update($request->all());
        return redirect()->back()->with('Success', 'Category updated successfully!');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('Success', 'Category deleted successfully!');
    }
}
