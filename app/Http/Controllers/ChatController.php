<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function askQuestion(Request $request)
    {
        $question = $request->input('question');
        $apiKey = env('OPENAI_API_KEY');

        // Send the request to OpenAI API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->withoutVerifying()
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                    ['role' => 'user', 'content' => $question],
                ],
            ]);

        // Log the response for debugging purposes
        Log::info('OpenAI Response: ', $response->json());

        // Check if the 'choices' key exists and handle the response accordingly
        if (isset($response->json()['choices'][0]['message']['content'])) {
            $answer = $response->json()['choices'][0]['message']['content'];
        } else {
            // Handle the error if the 'choices' key is not present
            $answer = "Sorry, I couldn't get a response from the AI. Please try again.";
        }

        return response()->json(['answer' => $answer]);
    }

}
