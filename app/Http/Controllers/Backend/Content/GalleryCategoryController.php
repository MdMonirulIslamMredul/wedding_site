<?php

namespace App\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = \App\Models\GalleryCategory::all();
        return view('backend.content.settings.gallery_category.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.content.settings.gallery_category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        \App\Models\GalleryCategory::create([
            'name' => $request->name,
            'is_active' => $request->is_active ? 1 : 0,
        ]);

        return redirect()->route('admin.setting.gallery-category.index')->withFlashSuccess('Gallery Category Created Successfully');
    }

    public function edit($id)
    {
        $category = \App\Models\GalleryCategory::findOrFail($id);
        return view('backend.content.settings.gallery_category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = \App\Models\GalleryCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'is_active' => $request->is_active ? 1 : 0,
        ]);

        return redirect()->route('admin.setting.gallery-category.index')->withFlashSuccess('Gallery Category Updated Successfully');
    }

    public function destroy($id)
    {
        $category = \App\Models\GalleryCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.setting.gallery-category.index')->withFlashSuccess('Gallery Category Deleted Successfully');
    }
}
