<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class LogController extends Controller
{
    public function index()
    {
        $items = Item::with('category.facility.location')->paginate(10);
        $title = 'Log Status';

        return view('pages.user.log', compact('items', 'title'));
    }
}
