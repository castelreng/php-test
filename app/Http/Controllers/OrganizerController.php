<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VoxApi\VoxApi;

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organizerName' => 'required',
            'imageLocation' => 'required|url',
        ]);

        if ($validator->fails()) {
            return redirect('organizer/create')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        VoxApi::createOrganizer($validated);
    }
}
