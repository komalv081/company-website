<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyJob;
use App\Models\News;
use App\Models\Document;
use App\Models\Policy;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJobs = CompanyJob::count();

        $totalNews = News::count();

        $totalDocuments = Document::count();

        $totalPolicies = Policy::count();

        return view(
            'admin.dashboard.index',
            compact(
                'totalJobs',
                'totalNews',
                'totalDocuments',
                'totalPolicies'
            )
        );
    }
}