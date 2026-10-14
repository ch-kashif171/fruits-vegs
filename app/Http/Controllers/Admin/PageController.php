<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(): View
    {
        return view('admin.pages.index', [
            'pages' => Page::query()->orderBy('slug')->get(),
        ]);
    }

    public function edit(Page $page): View
    {
        return view('admin.pages.edit', [
            'page' => $page,
        ]);
    }

    public function update(UpdatePageRequest $request, Page $page): RedirectResponse
    {
        $page->fill($request->safe()->only([
            'title',
            'meta_description',
            'hero_title',
            'hero_subtitle',
        ]));

        if ($request->hasFile('hero_image')) {
            $path = $request->file('hero_image')->store('heroes', 'public');
            $page->hero_image = '/storage/'.$path;
        }

        $page->extra = $this->extraFor($page, $request);
        $page->save();

        return redirect()
            ->route('admin.pages.edit', $page)
            ->with('status', 'Page content saved.');
    }

    /**
     * @return array<string, mixed>
     */
    private function extraFor(Page $page, UpdatePageRequest $request): array
    {
        $lines = fn (string $field): array => collect(preg_split("/\r\n|\r|\n/", $request->string($field)->toString()) ?: [])
            ->map(fn (string $line): string => trim($line))
            ->filter()
            ->values()
            ->all();

        return match ($page->slug) {
            'home' => [
                'intro_title' => $request->string('intro_title')->toString(),
                'intro_body' => $request->string('intro_body')->toString(),
                'cta_title' => $request->string('cta_title')->toString(),
                'cta_body' => $request->string('cta_body')->toString(),
                'cta_button' => $request->string('cta_button')->toString(),
            ],
            'about' => [
                'section_title' => $request->string('section_title')->toString(),
                'lead' => $request->string('lead')->toString(),
                'why_title' => $request->string('why_title')->toString(),
                'why_choose' => $lines('why_choose'),
                'mission' => $request->string('mission')->toString(),
                'vision' => $request->string('vision')->toString(),
                'values' => $lines('values'),
            ],
            'services' => [
                'faq_title' => $request->string('faq_title')->toString(),
            ],
            'contact' => [
                'intro_title' => $request->string('intro_title')->toString(),
                'form_title' => $request->string('form_title')->toString(),
            ],
            default => $page->extra ?? [],
        };
    }
}
