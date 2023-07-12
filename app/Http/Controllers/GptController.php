<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GptController extends Controller
{
    public function PreferredText(Request $request)
    {
        $response = \Http::withHeaders([
            'Authorization' => 'Bearer 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',
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                array('role' => 'user', 'content' => 'give preferred text for "' . $request->contentData . '" in 2-3 lines')
            ],
            'temperature' => 0.8,
        ]);

        $responseData = $response->json();
        $preferredText = $responseData['choices'][0]['message']['content'] ?? '';




        $response = \Http::withHeaders([
            'Authorization' => 'Bearer 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',
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                //   array('role' => 'user', 'content' => 'generate preferred text for "My name" in 2-3 lines'),
                array('role' => 'user', 'content' => 'generate 3-4 tags for "' . $request->contentData . '" in one line with space between tags and dont use , ')
            ],
            'temperature' => 0.8,
        ]);

        $responseData = $response->json();
        $tags = $responseData['choices'][0]['message']['content'] ?? '';

        return response()->json(['success' => true, 'content' => $preferredText,'tags'=>$tags]);
    }
}
