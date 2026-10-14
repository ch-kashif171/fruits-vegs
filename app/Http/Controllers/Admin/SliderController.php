<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SliderController extends Controller
{
    public function index(): View
    {
        return view('admin.sliders.index', [
            'sliders' => Slider::query()->orderBy('sort_order')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_link' => ['nullable', 'string', 'max:255'],
            'image_path' => ['required', 'image', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['required', 'integer'],
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/sliders'), $filename);
            $validated['image_path'] = 'images/sliders/' . $filename;
        }

        Slider::query()->create($validated);

        return redirect()
            ->route('admin.sliders.index')
            ->with('status', 'Slider created.');
    }

    public function edit(Slider $slider): View
    {
        return view('admin.sliders.edit', [
            'slider' => $slider,
        ]);
    }

    public function update(Request $request, Slider $slider): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'button_text' => ['nullable', 'string', 'max:255'],
            'button_link' => ['nullable', 'string', 'max:255'],
            'image_path' => ['nullable', 'image', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['required', 'integer'],
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/sliders'), $filename);
            $validated['image_path'] = 'images/sliders/' . $filename;
        } else {
            unset($validated['image_path']);
        }

        $slider->update($validated);

        return redirect()
            ->route('admin.sliders.index')
            ->with('status', 'Slider updated.');
    }

    public function destroy(Slider $slider): RedirectResponse
    {
        $slider->delete();

        return redirect()
            ->route('admin.sliders.index')
            ->with('status', 'Slider removed.');
    }
}
