<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function list()
    {
        return view('organizer.list', []);
    }

    public function create()
    {
        return view('organizer.create', []);
    }
}
