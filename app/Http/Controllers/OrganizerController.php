<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VoxApi\VoxApi;

class OrganizerController extends Controller
{
    public function list(Request $request)
    {
        $page = $request->query('page');
        $perPage = $request->query('perPage');

        $data = VoxApi::getOrganizers($page, $perPage);

        return view('organizer.list', ['organizers' => $data]);
    }

    public function show($organizeId)
    {
        $data = VoxApi::getOrganizer($organizeId, true);
        return view('organizer.detail', ['organizer' => $data]);
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
            return redirect('organizers/create')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();
        $organizer = VoxApi::createOrganizer($validated);

        return redirect('organizers/'.$organizer['id']);
    }
}
