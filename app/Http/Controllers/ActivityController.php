<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Category;
use App\Models\Item;
use App\Models\Location;

class ActivityController extends Controller
{
    public function index()
    {
        $notes = $notes = Note::paginate(6);
        $title = 'All Activity';
        return view('pages.user.activity.activity', compact('notes', 'title'));
    }

    public function viewByCategory()
    {
        $categories = Category::all();
        $notes = null;
        $title = 'View Activity by Category';
        return view('pages.user.activity.activity_bycategory', compact('categories', 'notes', 'title'));
    }

    public function viewByItem()
    {
        $items = Item::all();
        $notes = null;
        $title = 'View Activity by Item';
        return view('pages.user.activity.activity_byitem', compact('items', 'notes', 'title'));
    }

    public function viewByLocation()
    {
        $locations = Location::all();
        $notes = null;
        $title = 'View Activity by Location';
        return view('pages.user.activity.activity_bylocation', compact('locations', 'notes', 'title'));
    }

    public function filterActivity(Request $request)
    {
        $request->validate([
            'filter_type' => 'required|string|in:category,item,location',
            'filter_value' => 'required|integer',
        ]);

        $filterType = $request->input('filter_type');
        $filterValue = $request->input('filter_value');

        $notes = Note::with(['category', 'item', 'location'])
            ->when($filterType === 'category', function ($query) use ($filterValue) {
                $query->where('category_id', $filterValue);
            })
            ->when($filterType === 'item', function ($query) use ($filterValue) {
                $query->where('item_id', $filterValue);
            })
            ->when($filterType === 'location', function ($query) use ($filterValue) {
                $query->where('location_id', $filterValue);
            })
            ->paginate(5)
            ->appends($request->query());

        $title = 'Filtered Activities';

        $viewMap = [
            'category' => ['view' => 'pages.user.activity.activity_bycategory', 'data' => ['categories' => Category::all()]],
            'item' => ['view' => 'pages.user.activity.activity_byitem', 'data' => ['items' => Item::all()]],
            'location' => ['view' => 'pages.user.activity.activity_bylocation', 'data' => ['locations' => Location::all()]],
        ];

        $viewData = $viewMap[$filterType];
        $view = $viewData['view'];
        $additionalData = $viewData['data'];

        return view($view, array_merge(compact('notes', 'title'), $additionalData));
    }


    public function viewByStatus()
    {
        $todos = Note::where('status', 'todo')->get();
        $pendings = Note::where('status', 'pending')->get();
        $inProgress = Note::where('status', 'inprogress')->get();
        $dones = Note::where('status', 'done')->get();
        $cancels = Note::where('status', 'cancel')->get();

        $title = 'View Activity by Status';
        return view('pages.user.activity.activity_bystatus', compact('todos', 'pendings', 'inProgress', 'dones', 'cancels', 'title'));
    }
}
