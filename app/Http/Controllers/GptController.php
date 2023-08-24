<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GptController extends Controller
{

    public function PreferredText(Request $request)
    {
        $gptKey = "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";
        //generate prefred text
        $response = \Http::withHeaders([
            'Authorization' => "Bearer $gptKey",
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

        //generate prefred tags
        $response = \Http::withHeaders([
            'Authorization' => "Bearer $gptKey",
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                //   array('role' => 'user', 'content' => 'generate preferred text for "My name" in 2-3 lines'),
                array('role' => 'user', 'content' => 'generate 3-4 tags for "' . $request->contentData . '" format is #tag1 #tag2 #tag3 ')
            ],
            'temperature' => 0.8,
        ]);

        $responseData = $response->json();


        $tags = $responseData['choices'][0]['message']['content'] ?? '';


        //generate prefred image  on base of text

        $response = \Http::withToken('sk-PlQNscAIAlCD6CSHq7G2hypMOHkKRBd8WqGTmEzSG6pl3XYv')->post('https://api.stability.ai/v1/generation/stable-diffusion-v1-5/text-to-image', [

            "cfg_scale" => 7,
            "clip_guidance_preset" => "FAST_BLUE",
            "height" => 512,
            "width" => 640,
            "sampler" => "K_DPM_2_ANCESTRAL",
            "samples" => 4,
            "steps" => 75,
            "text_prompts" => [
                array(
                    'text' => $request->contentData,
                    'weight' => 1,
                ),
            ],
        ])->json();

        $images=$response['artifacts'] ??  [];

        return response()->json(['success' => true, 'content' => $preferredText, 'tags' => $tags,'images'=>$images]);
    }

    public function previewPage()
    {
        return view('preview');
    }
}
