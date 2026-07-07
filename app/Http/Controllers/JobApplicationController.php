<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class JobApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = JobApplication::with('jobPosition');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('current_location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $stats = [
            'total' => JobApplication::count(),
            'new' => JobApplication::where('status', 'new')->count(),
            'reviewed' => JobApplication::where('status', 'reviewed')->count(),
            'shortlisted' => JobApplication::where('status', 'shortlisted')->count(),
            'rejected' => JobApplication::where('status', 'rejected')->count(),
        ];

        $jobApplications = $query->latest()
            ->paginate(20)
            ->withQueryString();

        return view('job_applications.index', compact('jobApplications', 'stats'));
    }

    public function show(JobApplication $jobApplication)
    {
        $jobApplication->load('jobPosition');

        return view('job_applications.show', compact('jobApplication'));
    }

    public function update(Request $request, JobApplication $jobApplication)
    {
        $request->validate([
            'status' => ['required', Rule::in(['new', 'reviewed', 'shortlisted', 'rejected'])],
        ]);

        $jobApplication->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Application status updated successfully.');
    }

    public function destroy(JobApplication $jobApplication)
    {
        if ($jobApplication->cv_path) {
            Storage::disk('public')->delete($jobApplication->cv_path);
        }

        $jobApplication->delete();

        return redirect()
            ->route('job-applications.index')
            ->with('success', 'Application deleted successfully.');
    }
}