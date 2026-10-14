<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FeatureController extends Controller
{
    public function index(): View
    {
        return view('admin.features.index', [
            'features' => Feature::query()->orderBy('sort_order')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.features.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'type' => ['nullable', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'image_path' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['required', 'integer'],
        ]);

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/features'), $filename);
            $validated['image_path'] = 'images/features/' . $filename;
        }

        Feature::query()->create($validated);

        return redirect()
            ->route('admin.features.index')
            ->with('status', 'Feature created.');
    }

    public function edit(Feature $feature): View
    {
        return view('admin.features.edit', [
            'feature' => $feature,
        ]);
    }

    public function update(Request $request, Feature $feature): RedirectResponse
    {
        $validated = $request->validate([
            'type' => ['nullable', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:100'],
            'image_path' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['required', 'integer'],
        ]);

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/features'), $filename);
            $validated['image_path'] = 'images/features/' . $filename;
        } else {
            unset($validated['image_path']);
        }

        $feature->update($validated);

        return redirect()
            ->route('admin.features.index')
            ->with('status', 'Feature updated.');
    }

    public function destroy(Feature $feature): RedirectResponse
    {
        $feature->delete();

        return redirect()
            ->route('admin.features.index')
            ->with('status', 'Feature removed.');
    }
}
