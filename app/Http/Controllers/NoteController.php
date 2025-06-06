<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Location;
use App\Models\Category;
use App\Models\Item;

class NoteController extends Controller
{
    public function getCategories($locationId)
    {
        $categories = Category::where('location_id', $locationId)->get();
        return response()->json($categories);
    }

    public function getItems($categoryId)
    {
        $items = Item::where('category_id', $categoryId)->get();
        return response()->json($items);
    }

    public function index(Request $request)
    {
        $title = 'New Note';
        $user = \App\Models\User::first();

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
        $user = \App\Models\User::first();

        $validatedData = $request->validate([
            'location' => 'required|exists:locations,id',
            'category' => 'nullable|exists:categories,id',
            'item' => 'nullable|exists:items,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'problem' => 'required|string|max:255',
            'activity' => 'required|string|max:255',
            'status' => 'required|in:todo,pending,inprogress,done,cancel',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('notes_images', 'public') : null;

        Note::create(array_merge($validatedData, [
            'name' => $user->name,
            'user_id' => $user->id,
            'location_id' => $request->location,
            'category_id' => $request->category,
            'item_id' => $request->item,
            'image' => $imagePath
        ]));

        return redirect()->route('note.index')->with('success', 'Note saved successfully!');
    }

    public function indexNote()
    {
        $datanotes = Note::with(['user', 'location', 'category', 'item'])->get();
        $locations = Location::all();
        $title = 'Note Management Data';
        return view('pages.admin.master_data.note_data', compact('datanotes', 'locations', 'title'));
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
        $validatedData = $request->validate([
            'status' => 'required|in:todo,pending,inprogress,done,cancel',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'message' => 'required|string',
        ]);

        $note = Note::findOrFail($id);
        $note->update(array_merge($validatedData, ['activity' => $validatedData['message']]));

        return redirect()->route('activity-details', $id)->with('success', 'Activity updated successfully!');
    }
}
