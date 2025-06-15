<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Location;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $entries = $request->input('entries', 10);
        $search  = $request->input('search');

        $query = Category::with('location');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('category_name', 'like', "%{$search}%")
                    ->orWhereHas('location', function ($q2) use ($search) {
                        $q2->where('location_name', 'like', "%{$search}%");
                    });
            });
        }

        $categories = $query->paginate($entries)->appends($request->all());
        $location   = Location::all();
        $title      = 'Category Management Data';

        return view('pages.admin.master_data.category_data', compact('categories', 'location', 'title'));
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect()->back()->with('Success', 'Category created successfully!');
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->back()->with('Success', 'Category updated successfully!');
    }

    public function delete($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->back()->with('Success', 'Category deleted successfully!');
    }
}
