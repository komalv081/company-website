<?php

namespace App\Http\Controllers;

use App\Models\CompanyJobs;

class JobPageController extends Controller
{
    public function index()
    {
        $jobs = CompanyJobs::latest()->get();

        return view(
            'jobs.index',
            compact('jobs')
        );
    }
}
