<?php

namespace App\Http\Controllers;

use App\Models\CompanyJob;

class JobPageController extends Controller
{
    public function index()
    {
        $jobs = CompanyJob::latest()->get();

        return view(
            'jobs.index',
            compact('jobs')
        );
    }
}
