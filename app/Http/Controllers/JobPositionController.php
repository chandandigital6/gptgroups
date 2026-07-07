<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobPosition;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    public function index(Request $request)
    {
        $query = JobPosition::query()->withCount('applications');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%")
                    ->orWhere('job_type', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('experience', 'like', "%{$search}%");
            });
        }

        $stats = [
            'total' => JobPosition::count(),
            'active' => JobPosition::where('status', 1)->count(),
            'inactive' => JobPosition::where('status', 0)->count(),
            'applications' => JobApplication::count(),
        ];

        $jobPositions = $query->orderBy('sort_order')
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('job_positions.index', compact('jobPositions', 'stats'));
    }

    public function create()
    {
        return view('job_positions.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');

        JobPosition::create($data);

        return redirect()
            ->route('job-positions.index')
            ->with('success', 'Job created successfully.');
    }

    public function show(JobPosition $jobPosition)
    {
        $jobPosition->load('applications');

        return view('job_positions.show', compact('jobPosition'));
    }

    public function edit(JobPosition $jobPosition)
    {
        return view('job_positions.edit', compact('jobPosition'));
    }

    public function update(Request $request, JobPosition $jobPosition)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');

        $jobPosition->update($data);

        return redirect()
            ->route('job-positions.index')
            ->with('success', 'Job updated successfully.');
    }

    public function destroy(JobPosition $jobPosition)
    {
        $jobPosition->delete();

        return redirect()
            ->route('job-positions.index')
            ->with('success', 'Job deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'icon_text' => ['nullable', 'string', 'max:10'],
            'icon_theme' => ['required', 'string', 'max:50'],
            'job_type' => ['required', 'string', 'max:100'],
            'badge_theme' => ['required', 'string', 'max:50'],
            'location' => ['nullable', 'string', 'max:255'],
            'experience' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'full_description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}