<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;  // Import Guzzle HTTP Client
use Illuminate\Support\Facades\DB; // Import DB Facade

class TrackingController extends Controller
{
    // Function to get the user's country using their IP address
    public function getUserCountry($ip)
    {
        $client = new Client();
        
        // Replace 'your_token' with your actual token from ipinfo.io
        $response = $client->get("https://ipinfo.io/[IP address]?token=1617d64ab1e387");
        // Decode the JSON response into a PHP array
        $data = json_decode($response->getBody(), true);

        // Return the country code or 'Unknown' if not found
        return $data['country'] ?? 'Unknown';
    }

    // Function to track time spent on the site and save it to the database
    public function trackTimeSpent(Request $request)
    {
        $timeSpent = $request->input('timeSpent');  // Get time spent from the request
        $ipAddress = $request->ip();  // Get the user's IP address
        $country = $this->getUserCountry($ipAddress);  // Get the user's country using the IP

        // Insert the data into the user_visits table
        DB::table('user_visits')->insert([
            'ip' => $ipAddress,
            'country' => $country,
            'time_spent' => $timeSpent,  // Store the time spent
            'created_at' => now()  // Timestamp for the visit
        ]);

        // Return a success response in JSON format
        return response()->json(['status' => 'success']);
    }
}
