<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class LogController extends Controller
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

        $items = $query->paginate($entries)->appends($request->all());
        $title = 'Log Status';

        return view('pages.user.log', compact(
            'items',
            'title'
        ));
    }
}
