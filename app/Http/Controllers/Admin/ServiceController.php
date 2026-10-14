<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('admin.services.index', [
            'services' => Service::query()->ordered()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.services.create');
    }

    public function store(StoreServiceRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/services'), $filename);
            $data['icon'] = 'images/services/'.$filename;
        }

        Service::query()->create($data);

        return redirect()
            ->route('admin.services.index')
            ->with('status', 'Service created.');
    }

    public function edit(Service $service): View
    {
        return view('admin.services.edit', [
            'service' => $service,
        ]);
    }

    public function update(UpdateServiceRequest $request, Service $service): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/services'), $filename);
            $data['icon'] = 'images/services/'.$filename;
        } else {
            unset($data['icon']);
        }

        $service->update($data);

        return redirect()
            ->route('admin.services.index')
            ->with('status', 'Service updated.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('status', 'Service removed.');
    }
}
