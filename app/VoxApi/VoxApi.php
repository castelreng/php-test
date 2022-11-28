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

    public static function getOrganizers($page = 0, $perPage) {
        $response = Http::withToken(env('VOX_TOKEN'))->get(
            env('VOX_API') . '/organizers' . '?' . http_build_query(['page' => $page, 'perPage' => $perPage])
        );
        return $response['data'];
    }
}
