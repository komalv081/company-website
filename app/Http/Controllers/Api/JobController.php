<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function index()
    {
        return response()->json(
            CompanyJobs::latest()->get()
        );
    }

    public function store(Request $request)
    {
        $job = CompanyJobs::create([

            'title'=>$request->title,

            'slug'=>Str::slug($request->title),

            'description'=>$request->description,

            'department'=>$request->department,

            'location'=>$request->location,

            'experience'=>$request->experience,

            'employment_type'=>$request->employment_type,

            'vacancies'=>$request->vacancies,

            'deadline'=>$request->deadline,

            'status'=>$request->status
        ]);

        return response()->json($job);
    }
    public function destroy($id)
    {
        CompanyJobs::findOrFail($id)->delete();

        return response()->json([
            'message'=>'Deleted successfully'
        ]);
    }
    public function update(Request $request, $id)
    {
        $job = CompanyJobs::findOrFail($id);

        $job->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'department'=>$request->department,
            'location'=>$request->location,
            'experience'=>$request->experience,
            'employment_type'=>$request->employment_type,
            'vacancies'=>$request->vacancies,
            'status'=>$request->status
        ]);

        return response()->json($job);
    }
}
