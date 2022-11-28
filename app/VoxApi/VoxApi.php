<?php

namespace App\VoxApi;
use Illuminate\Support\Facades\Http;

class VoxApi
{
    public static function createOrganizer($data) {
        $response = Http::post(
            API_URL . '/organizers',
            [
                'organizerName' => $data['organizerName'],
                'imageLocation' => $data['imageLocation']
            ]
        );
        return $response;
    }

    public static function getOrganizer($id, $withEvents = false) {
        $organizer = Http::withToken(env('VOX_TOKEN'))->get(
            env('VOX_API') . '/organizers/' . $id
        )->json();
   
        $organizer['events'] = [];
        if($withEvents) {
            $organizer['events'] = VoxApi::getSportEvents($id);
        }
    
        return $organizer;
    }

    public static function getOrganizers($page = 0, $perPage) {
        $response = Http::withToken(env('VOX_TOKEN'))->get(
            env('VOX_API') . '/organizers' . '?' . http_build_query(['page' => $page, 'perPage' => $perPage])
        )->json();
        return $response['data'];
    }

    public static function getSportEvents($organizerId, $page = 0) {
        $response = Http::withToken(env('VOX_TOKEN'))->get(
            env('VOX_API') . '/sport-events' . '?' . http_build_query(['organizerId' => $organizerId, 'page' => $page])
        )->json();
        return $response['data'];
    }
}
