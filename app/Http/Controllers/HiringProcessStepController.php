<?php

namespace App\Http\Controllers;

use App\Models\HiringProcessStep;
use Illuminate\Http\Request;

class HiringProcessStepController extends Controller
{
    public function index(Request $request)
    {
        $query = HiringProcessStep::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('theme', 'like', "%{$search}%");
            });
        }

        $stats = [
            'total' => HiringProcessStep::count(),
            'active' => HiringProcessStep::where('status', 1)->count(),
            'inactive' => HiringProcessStep::where('status', 0)->count(),
        ];

        $hiringProcessSteps = $query->orderBy('sort_order')
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('hiring_process_steps.index', compact('hiringProcessSteps', 'stats'));
    }

    public function create()
    {
        return view('hiring_process_steps.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');

        HiringProcessStep::create($data);

        return redirect()
            ->route('hiring-process-steps.index')
            ->with('success', 'Hiring step created successfully.');
    }

    public function show(HiringProcessStep $hiringProcessStep)
    {
        return view('hiring_process_steps.show', compact('hiringProcessStep'));
    }

    public function edit(HiringProcessStep $hiringProcessStep)
    {
        return view('hiring_process_steps.edit', compact('hiringProcessStep'));
    }

    public function update(Request $request, HiringProcessStep $hiringProcessStep)
    {
        $data = $this->validatedData($request);
        $data['status'] = $request->boolean('status');

        $hiringProcessStep->update($data);

        return redirect()
            ->route('hiring-process-steps.index')
            ->with('success', 'Hiring step updated successfully.');
    }

    public function destroy(HiringProcessStep $hiringProcessStep)
    {
        $hiringProcessStep->delete();

        return redirect()
            ->route('hiring-process-steps.index')
            ->with('success', 'Hiring step deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'icon_text' => ['nullable', 'string', 'max:10'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'theme' => ['required', 'string', 'max:50'],
            'sort_order' => ['nullable', 'integer'],
        ]);
    }
}