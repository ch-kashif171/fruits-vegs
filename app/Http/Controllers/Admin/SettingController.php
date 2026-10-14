<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings.edit', [
            'settings' => Setting::map(),
        ]);
    }

    public function update(UpdateSettingRequest $request): RedirectResponse
    {
        $values = $request->safe()->except(['logo']);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('branding', 'public');
            $values['logo_path'] = '/storage/'.$path;
        }

        Setting::putMany($values);

        return back()->with('status', 'Site settings saved.');
    }
}
