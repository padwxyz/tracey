<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $todos = Note::where('status', 'todo')->count();
        $pendings = Note::where('status', 'pending')->count();
        $inProgress = Note::where('status', 'in_progress')->count();
        $dones = Note::where('status', 'done')->count();
        $cancels = Note::where('status', 'cancel')->count();

        $notesToday = Note::whereDate('created_at', Carbon::today())->count();
        $notesThisMonth = Note::whereMonth('created_at', Carbon::now()->month)->count();
        $notesThisYear = Note::whereYear('created_at', Carbon::now()->year)->count();

        $title = 'Admin Dashboard';

        return view('pages.admin.dashboard_admin', compact(
            'todos',
            'pendings',
            'inProgress',
            'dones',
            'cancels',
            'notesToday',
            'notesThisMonth',
            'notesThisYear',
            'title'
        ));
    }
}
