<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Location;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $entries = $request->input('entries', 10);
        $search  = $request->input('search');

        $query = Item::with('category.location');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('item_name', 'like', "%{$search}%")
                    ->orWhereHas('category', function ($q2) use ($search) {
                        $q2->where('category_name', 'like', "%{$search}%")
                            ->orWhereHas('location', function ($q3) use ($search) {
                                $q3->where('location_name', 'like', "%{$search}%");
                            });
                    });
            });
        }

        $items      = $query->paginate($entries)->appends($request->all());
        $categories = Category::with('location')->get();
        $locations  = Location::all();
        $title      = 'Item Management Data';

        return view('pages.admin.master_data.item_data', compact(
            'items',
            'categories',
            'locations',
            'title'
        ));
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
