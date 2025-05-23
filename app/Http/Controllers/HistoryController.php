<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class HistoryController extends Controller
{
    public function index()
    {
        $title = 'History';
        $notes = Note::all();
        return view('pages.user.history', compact('title', 'notes'));
    }
}
