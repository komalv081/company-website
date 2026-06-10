<?php

namespace App\Http\Controllers;
use App\Models\CompanyJobs;
use App\Models\News;
use App\Models\Document;
use App\Models\Policy;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\KnowledgeBase;
use App\Services\KnowledgeBaseRetrievalService;
class AIChatController extends Controller
{
    protected KnowledgeBaseRetrievalService $retrievalService;

    public function __construct(
        KnowledgeBaseRetrievalService $retrievalService
    )
    {
        $this->retrievalService = $retrievalService;
    }
    public function index()
    {
        $messages = ChatMessage::orderBy('id')->get();

        return view(
            'ai-chat',
            compact('messages')
        );
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

        $knowledgeChunks = $this->retrievalService
        ->retrieve($request->question);

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
        $companyContext .= "\nKNOWLEDGE BASE:\n";

        //This is the Augmentation part.
       foreach ($knowledgeChunks as $chunk)
        {
            $companyContext .=
            "Chunk {$chunk->chunk_number}:\n\n";

            $companyContext .=
            $chunk->content . "\n\n";
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

        //This is the Generation part.
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
