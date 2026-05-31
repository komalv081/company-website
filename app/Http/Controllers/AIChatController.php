<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class AIChatController extends Controller
{
    public function index()
    {
        return view('ai-chat');
    }

    public function ask(Request $request)
    {
        $response = OpenAI::chat()->create([

            'model' => 'gpt-4.1-mini',

            'messages' => [

                [
                    'role' => 'system',
                    'content' => 'You are a helpful company assistant.'
                ],

                [
                    'role' => 'user',
                    'content' => $request->question
                ]
            ]
        ]);

        return view('ai-chat', [

            'question' => $request->question,

            'answer' => $response->choices[0]->message->content
        ]);
    }
}