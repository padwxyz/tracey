<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Carbon\Carbon;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $todos      = Note::where('status', 'todo')->count();
        $pendings   = Note::where('status', 'pending')->count();
        $inProgress = Note::where('status', 'inprogress')->count();
        $dones      = Note::where('status', 'done')->count();
        $cancels    = Note::where('status', 'cancel')->count();

        $notesToday = Note::whereDate('created_at', Carbon::today())->count();

        $notesThisMonth = Note::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        $notesThisYear = Note::whereYear('created_at', Carbon::now()->year)->count();

        $recentActivities = Note::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('pages.admin.dashboard_admin', compact(
            'todos',
            'pendings',
            'inProgress',
            'dones',
            'cancels',
            'notesToday',
            'notesThisMonth',
            'notesThisYear',
            'recentActivities'
        ));
    }
}
