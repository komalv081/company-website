<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CompanyJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class JobController extends Controller
{
    // LIST JOBS
    public function index()
    {
        $jobs = CompanyJobs::latest()->get();
        return view('admin.jobs.index', compact('jobs'));
    }
    // CREATE PAGE
    public function create()
    {
        return view( 'admin.jobs.create');
    }
    // STORE JOB
    public function store(Request $request)
    {
        CompanyJobs::create([
        'title'=>$request->title,
        'slug'=>Str::slug( $request->title ),
        'description'=>$request->description,
        'department'=>$request->department,
        'location'=>$request->location,
        'experience'=>$request->experience,
        'employment_type'=>$request->employment_type,
        'vacancies'=>$request->vacancies,
        'deadline'=>$request->deadline,
        'status'=>'published'
        ]);
        return redirect(
        '/admin/jobs'
        );
    }
    // EDIT PAGE
    public function edit($id)
    {
        $job = CompanyJobs::findOrFail($id);
        return view(
        'admin.jobs.edit',
        compact('job')
        );
    }
    // UPDATE JOB
    public function update(  Request $request, $id)
    {
        $job = CompanyJobs::findOrFail($id);
        $job->update([
        'title'=>$request->title,
        'slug'=>Str::slug( $request->title),
        'description'=>$request->description,
        'department'=>$request->department,
        'location'=>$request->location,
        'experience'=>$request->experience,
        'employment_type'=>$request->employment_type,
        'vacancies'=>$request->vacancies,
        'deadline'=>$request->deadline
        ]);
        return redirect('/admin/jobs');
    }
    // DELETE JOB
    public function destroy($id)
    {
        $job = CompanyJobs::findOrFail($id);
        $job->delete();
        return redirect(   '/admin/jobs');
    }
}
?>