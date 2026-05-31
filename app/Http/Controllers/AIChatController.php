<?php

namespace App\Http\Controllers;
use App\Models\CompanyJobs;
use App\Models\News;
use App\Models\Document;
use App\Models\Policy;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class AIChatController extends Controller
{
    public function index()
    {
        $messages = ChatMessage::orderBy('id')->get();

        return view(
            'ai-chat',
            compact('messages')
        );
    }

    public function ask(Request $request)
    {
        // Save User Message

        ChatMessage::create([
            'role' => 'user',
            'message' => $request->question
        ]);

        // Load Chat History

        $messages = ChatMessage::orderBy('id')->get();

        // Company Data

        $jobs = CompanyJobs::all();

        $policies = Policy::all();

        $news = News::latest()->take(10)->get();

        $documents = Document::all();

        // Build Company Context

        $companyContext = "COMPANY INFORMATION\n\n";

        $companyContext .= "AVAILABLE JOBS:\n";

        foreach ($jobs as $job)
        {
            $companyContext .=
            "- {$job->title}
            Department: {$job->department}
            Location: {$job->location}
            Experience: {$job->experience}

            ";
        }

        $companyContext .= "\nPOLICIES:\n";

        foreach ($policies as $policy)
        {
            $companyContext .=
            "- {$policy->title}
            Category: {$policy->category}
            Description: {$policy->description}

            ";
        }

        $companyContext .= "\nNEWS:\n";

        foreach ($news as $article)
        {
            $companyContext .=
            "- {$article->title}
            Description: {$article->description}

            ";
        }

        $companyContext .= "\nDOCUMENTS:\n";

        foreach ($documents as $document)
        {
            $companyContext .=
            "- {$document->title}
            Type: {$document->type}

            ";
        }

        // Messages Sent To OpenAI

        $chatMessages = [

            [
                'role' => 'system',
                'content' => "

                You are AI Mimi.

                You are the official company assistant.

                Use the company information below when answering.

                {$companyContext}

                Rules:

                1. If the answer exists in company data, use company data.
                2. If the answer is not in company data, answer normally.
                3. Be professional and helpful.
                4. Do not invent company information.

                "
            ]

        ];

        // Add Chat History

        foreach ($messages as $message)
        {
            $chatMessages[] = [
                'role' => $message->role,
                'content' => $message->message
            ];
        }

        // OpenAI Request

        $response = OpenAI::chat()->create([

            'model' => 'gpt-4.1-mini',

            'messages' => $chatMessages

        ]);

        $answer = $response->choices[0]->message->content;

        // Save AI Response

        ChatMessage::create([
            'role' => 'assistant',
            'message' => $answer
        ]);

        return redirect('/ai-chat');
    }

    public function sendMessage(Request $request)
    {
        ChatMessage::create([
            'role' => 'user',
            'message' => $request->question
        ]);

        $messages = ChatMessage::orderBy('id')->get();

        // Company Data

        $jobs = CompanyJobs::all();

        $policies = Policy::all();

        $news = News::latest()->take(10)->get();

        $documents = Document::all();

        // Build Company Context

        $companyContext = "COMPANY INFORMATION\n\n";

        $companyContext .= "AVAILABLE JOBS:\n";

        foreach ($jobs as $job)
        {
            $companyContext .=
            "- {$job->title}
            Department: {$job->department}
            Location: {$job->location}
            Experience: {$job->experience}
            ";
        }

        $companyContext .= "\nPOLICIES:\n";

        foreach ($policies as $policy)
        {
            $companyContext .=
            "- {$policy->title}
            Category: {$policy->category}
            Description: {$policy->description}

            ";
        }

        $companyContext .= "\nNEWS:\n";

        foreach ($news as $article)
        {
            $companyContext .=
            "- {$article->title}
             Description: {$article->description}
            ";
        }

        $companyContext .= "\nDOCUMENTS:\n";

        foreach ($documents as $document)
        {
            $companyContext .=
            "- {$document->title}
            Type: {$document->type}

            ";
        }

        $chatMessages = [

            [
                'role' => 'system',
                'content' => "

                You are AI Mimi.

                You are the official company assistant.

                Use the company information below when answering.

                {$companyContext}

                Rules:

                1. If the answer exists in company data, use company data.
                2. If the answer is not in company data, answer normally.
                3. Be professional and helpful.
                4. Do not invent company information.

                "
            ]

        ];

        foreach ($messages as $message)
        {
            $chatMessages[] = [
                'role' => $message->role,
                'content' => $message->message
            ];
        }

        $response = OpenAI::chat()->create([

            'model' => 'gpt-4.1-mini',

            'messages' => $chatMessages

        ]);

        $answer = $response->choices[0]->message->content;

        ChatMessage::create([
            'role' => 'assistant',
            'message' => $answer
        ]);

        return response()->json([

            'success' => true,

            'question' => $request->question,

            'answer' => $answer

        ]);
    }
}