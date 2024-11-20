<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
class TrackingController extends Controller
{
    public function getUserCountry($ip)
    {
        $client = new \GuzzleHttp\Client();

        try {
            // Call geoplugin API
            $response = $client->get("http://www.geoplugin.net/json.gp?ip={$ip}");
            $data = json_decode($response->getBody(), true);

            // Extract country name
            return $data['geoplugin_countryName'] ?? 'Unknown';
        } catch (\Exception $e) {
            // Handle errors and log for debugging
            \Log::error('Geolocation error: ' . $e->getMessage());
            return 'Unknown';
        }
    }


    public function trackTimeSpent(Request $request)
    {
        $timeSpent = $request->input('timeSpent');
        $ipAddress = $request->header('X-Forwarded-For') ?? $request->ip(); // Use forwarded IP if available
        $ipAddress = explode(',', $ipAddress)[0]; // If multiple IPs, get the first one
        $country = $this->getUserCountry($ipAddress);

        // Save data to the database
        DB::table('user_visits')->insert([
            'ip' => $ipAddress,
            'country' => $country,
            'time_spent' => $timeSpent,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['status' => 'success']);
    }

}

