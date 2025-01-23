<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::with('category.location')->get();
        $category = Category::with('location')->get();
        $title = 'Item Management Data';
        return view('', compact('item', 'category', 'title'));
    }

    public function store(Request $request)
    {
        Item::create($request->all());
        return redirect()->back()->with('Success', 'Item created successfully!');
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->all());
        return redirect()->back()->with('Success', 'Item updated successfully!');
    }

    public function delete($id)
    {
        Item::findOrFail($id)->delete();
        return redirect()->back()->with('Success', 'Item deleted successfully!');
    }
}
