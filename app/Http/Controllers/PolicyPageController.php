<?php

namespace App\Http\Controllers;

use App\Models\Policy;

class PolicyPageController extends Controller
{
    public function index()
    {
        $policies = Policy::latest()->get();

        return view(
            'policies.index',
            compact('policies')
        );
    }
}