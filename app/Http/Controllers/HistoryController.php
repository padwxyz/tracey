<?php

namespace App\Http\Controllers;

use App\Models\Note;

class HistoryController extends Controller
{
    public function index()
    {
        $title = 'History';
        $notes = Note::latest()->paginate(5);
        return view('pages.user.history', compact('title', 'notes'));
    }
}
