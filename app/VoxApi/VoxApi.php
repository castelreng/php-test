<?php

namespace App\VoxApi;

const API_URL = "https://api-sport-events.php6-02.test.voxteneo.com/api/v1/";

class VoxLib
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
}
