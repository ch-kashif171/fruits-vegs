<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduceItemRequest;
use App\Http\Requests\UpdateProduceItemRequest;
use App\Models\ProduceItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProduceItemController extends Controller
{
    public function index(): View
    {
        $allItems = ProduceItem::query()->ordered()->get();

        return view('admin.produce-items.index', [
            'items' => $allItems,
            'fruits' => $allItems->where('category', 'fruit')->values(),
            'vegetables' => $allItems->where('category', 'vegetable')->values(),
            'others' => $allItems->whereNotIn('category', ['fruit', 'vegetable'])->values(),
        ]);
    }

    public function create(): View
    {
        return view('admin.produce-items.create');
    }

    public function store(StoreProduceItemRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/produce'), $filename);
            $validated['image_path'] = 'images/produce/'.$filename;
        }

        ProduceItem::query()->create($validated);

        return redirect()
            ->route('admin.produce-items.index')
            ->with('status', 'Produce item created.');
    }

    public function edit(ProduceItem $produceItem): View
    {
        return view('admin.produce-items.edit', [
            'item' => $produceItem,
        ]);
    }

    public function update(UpdateProduceItemRequest $request, ProduceItem $produceItem): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/produce'), $filename);
            $validated['image_path'] = 'images/produce/'.$filename;
        } else {
            unset($validated['image_path']);
        }

        $produceItem->update($validated);

        return redirect()
            ->route('admin.produce-items.index')
            ->with('status', 'Produce item updated.');
    }

    public function destroy(ProduceItem $produceItem): RedirectResponse
    {
        $produceItem->delete();

        return redirect()
            ->route('admin.produce-items.index')
            ->with('status', 'Produce item removed.');
    }
}
