<?php

namespace App\Http\Controllers;

use App\Models\StrategySection;
use Illuminate\Http\Request;

class StrategySectionController extends Controller
{
    public function index(Request $request)
    {
        $query = StrategySection::query();

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('label', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('strategy_1_title', 'like', "%{$search}%")
                    ->orWhere('strategy_2_title', 'like', "%{$search}%")
                    ->orWhere('strategy_3_title', 'like', "%{$search}%")
                    ->orWhere('strategy_4_title', 'like', "%{$search}%");
            });
        }

        $strategySections = $query
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('strategy_sections.index', compact('strategySections'));
    }

    public function create()
    {
        return view('strategy_sections.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        StrategySection::create($data);

        return redirect()
            ->route('strategy-sections.index')
            ->with('success', 'Strategy section created successfully.');
    }

    public function show(StrategySection $strategySection)
    {
        return view('strategy_sections.show', compact('strategySection'));
    }

    public function edit(StrategySection $strategySection)
    {
        return view('strategy_sections.edit', compact('strategySection'));
    }

    public function update(Request $request, StrategySection $strategySection)
    {
        $data = $this->validatedData($request);

        $data['status'] = $request->has('status') ? 1 : 0;
        $data['sort_order'] = $request->sort_order ?? 0;

        $strategySection->update($data);

        return redirect()
            ->route('strategy-sections.index')
            ->with('success', 'Strategy section updated successfully.');
    }

    public function destroy(StrategySection $strategySection)
    {
        $strategySection->delete();

        return redirect()
            ->route('strategy-sections.index')
            ->with('success', 'Strategy section deleted successfully.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'label' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',

            'strategy_1_number' => 'nullable|string|max:50',
            'strategy_1_title' => 'nullable|string|max:255',
            'strategy_1_description' => 'nullable|string',

            'strategy_2_number' => 'nullable|string|max:50',
            'strategy_2_title' => 'nullable|string|max:255',
            'strategy_2_description' => 'nullable|string',

            'strategy_3_number' => 'nullable|string|max:50',
            'strategy_3_title' => 'nullable|string|max:255',
            'strategy_3_description' => 'nullable|string',

            'strategy_4_number' => 'nullable|string|max:50',
            'strategy_4_title' => 'nullable|string|max:255',
            'strategy_4_description' => 'nullable|string',

            'sort_order' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);
    }
}