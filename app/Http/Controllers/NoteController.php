<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Location;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;

class NoteController extends Controller
{
    public function getCategories($locationId)
    {
        $categories = Category::where('location_id', $locationId)
            ->select('id', 'category_name')
            ->get();

        return response()->json($categories);
    }

    public function getItems($categoryId)
    {
        $items = Item::where('category_id', $categoryId)
            ->select('id', 'item_name')
            ->get();

        return response()->json($items);
    }

    public function index(Request $request)
    {
        $title = 'New Note';
        $user = User::first();
        $locations = Location::all();
        $categories = collect();
        $items = collect();

        $selectedLocation = $request->location;
        $selectedCategory = $request->category;

        if ($selectedLocation) {
            $categories = Category::where('location_id', $selectedLocation)->get();
        }

        if ($selectedCategory) {
            $items = Item::where('category_id', $selectedCategory)->get();
        }

        return view('pages.user.note', compact(
            'title',
            'user',
            'locations',
            'categories',
            'items',
            'selectedLocation',
            'selectedCategory'
        ));
    }

    public function store(Request $request)
    {
        $user = User::first();

        $validated = $request->validate([
            'location'   => 'required|exists:locations,id',
            'category'   => 'nullable|exists:categories,id',
            'item'       => 'nullable|exists:items,id',
            'date'       => 'required|date',
            'time'       => 'required|date_format:H:i',
            'problem'    => 'required|string|max:255',
            'activity'   => 'required|string|max:255',
            'status'     => 'required|in:todo,pending,inprogress,done,cancel',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->hasFile('image')
            ? $request->file('image')->store('notes_images', 'public')
            : null;

        Note::create([
            'user_id'     => $user->id,
            'name'        => $user->name,
            'location_id' => $request->location,
            'category_id' => $request->category,
            'item_id'     => $request->item,
            'date'        => $validated['date'],
            'time'        => $validated['time'],
            'problem'     => $validated['problem'],
            'activity'    => $validated['activity'],
            'status'      => $validated['status'],
            'image'       => $imagePath,
        ]);

        return redirect()->route('note.index')->with('success', 'Note saved successfully!');
    }

    public function indexNote(Request $request)
    {
        $title = 'Note Management Data';
        $locations = Location::all();
        $categories = Category::all();

        $entries = $request->input('entries', 10);
        $search = $request->input('search');

        $query = Note::with(['user', 'location', 'category.location', 'item']);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', fn($q) => $q->where('name', 'like', "%$search%"))
                    ->orWhereHas('category', fn($q) => $q->where('category_name', 'like', "%$search%"))
                    ->orWhereHas('location', fn($q) => $q->where('location_name', 'like', "%$search%"))
                    ->orWhereHas('item', fn($q) => $q->where('item_name', 'like', "%$search%"))
                    ->orWhere('date', 'like', "%$search%")
                    ->orWhere('time', 'like', "%$search%")
                    ->orWhere('problem', 'like', "%$search%")
                    ->orWhere('activity', 'like', "%$search%")
                    ->orWhere('status', 'like', "%$search%");
            });
        }

        $datanotes = $query->paginate($entries)->appends($request->all());

        return view('pages.admin.master_data.note_data', compact('datanotes', 'locations', 'categories', 'title'));
    }

    public function storeNote(Request $request)
    {
        Note::create($request->all());

        return redirect()->back()->with('success', 'Note created successfully.');
    }

    public function updateNote(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->update($request->all());

        return redirect()->back()->with('success', 'Note updated successfully.');
    }

    public function deleteNote($id)
    {
        Note::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Note deleted successfully.');
    }

    public function allActivity()
    {
        $title = 'All Activity';
        $notes = Note::all();

        return view('pages.user.activity.activity', compact('title', 'notes'));
    }

    public function showActivityDetails($id)
    {
        $title = 'Activity Details';
        $note = Note::findOrFail($id);

        return view('pages.user.activity.activity_details', compact('note', 'title'));
    }

    public function updateActivity(Request $request, $id)
    {
        $validated = $request->validate([
            'status'  => 'required|in:todo,pending,inprogress,done,cancel',
            'date'    => 'required|date',
            'time'    => 'required|date_format:H:i',
            'message' => 'required|string',
        ]);

        $note = Note::findOrFail($id);
        $note->update([
            'status'   => $validated['status'],
            'date'     => $validated['date'],
            'time'     => $validated['time'],
            'activity' => $validated['message'],
        ]);

        return redirect()->route('activity-details', $id)->with('success', 'Activity updated successfully!');
    }
}
