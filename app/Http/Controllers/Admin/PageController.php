<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index', [
            'pages' => Page::orderBy('name')->get(),
        ]);
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', ['page' => $page]);
    }

    public function update(PageRequest $request, Page $page)
    {
        $data = $request->safe()->except('og_image');

        if ($request->hasFile('og_image')) {
            if ($page->og_image) {
                Storage::disk('public')->delete($page->og_image);
            }
            $data['og_image'] = Storage::disk('public')->put('pages', $request->file('og_image'));
        }

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('status', 'Page SEO updated.');
    }
}
