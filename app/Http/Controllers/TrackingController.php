<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;  
use Illuminate\Support\Facades\DB; 
class TrackingController extends Controller
{
    public function getUserCountry($ip)
    {
        $client = new Client();

        try {
            $response = $client->get("https://ipinfo.io/{$ip}/json?token=1617d64ab1e387");
            $data = json_decode($response->getBody(), true);

            return $data['country'] ?? 'Unknown';
        } catch (\Exception $e) {
            return 'Unknown'; 
        }
    }

    public function trackTimeSpent(Request $request)
    {
        $timeSpent = $request->input('timeSpent');  
        $ipAddress = $request->ip();  
        $country = $this->getUserCountry($ipAddress);  

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

