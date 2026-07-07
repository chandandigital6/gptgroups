<?php

namespace App\Http\Controllers;

use App\Models\CareerSection;
use App\Models\HiringProcessStep;
use App\Models\JobApplication;
use App\Models\JobPosition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CareerController extends Controller
{
    public function index()
    {
        $careerSections = CareerSection::active()
            ->get()
            ->keyBy('section_key');

        $jobPositions = JobPosition::active()
            ->ordered()
            ->get();

        $hiringProcessSteps = HiringProcessStep::active()
            ->ordered()
            ->get();

        return view('front_pages.carriers', compact(
            'careerSections',
            'jobPositions',
            'hiringProcessSteps'
        ));
    }

    public function apply(Request $request)
    {
        $data = $request->validate([
            'job_position_id' => [
                'required',
                Rule::exists('job_positions', 'id')->where('status', 1),
            ],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'current_location' => ['nullable', 'string', 'max:255'],
            'cv' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'message' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('cv')) {
            $data['cv_path'] = $request->file('cv')->store('job-cvs', 'public');
        }

        unset($data['cv']);

        JobApplication::create($data);

        return back()->with('success', 'Your application has been submitted successfully.');
    }
}