<?php

namespace App\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\AlbumPicture;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('id', 'desc')->get();
        return view('backend.content.album.index', compact('albums'));
    }

    public function create()
    {
        return view('backend.content.album.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        $album = new Album();
        $album->title = $request->title;
        $album->details = $request->details;
        $album->is_active = $request->is_active ?? 1;

        if ($request->hasFile('cover_image')) {
            $coverImage = time() . '_cover.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('setting/banner'), $coverImage);
            $album->cover_image = $coverImage;
        }

        $album->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imageName = time() . '_' . $key . '.' . $file->extension();
                $file->move(public_path('setting/banner'), $imageName);
                
                AlbumPicture::create([
                    'album_id' => $album->id,
                    'image' => $imageName
                ]);
            }
        }

        return redirect()->route('admin.setting.album.index')->withFlashSuccess('Album Created Successfully');
    }

    public function edit($id)
    {
        $album = Album::with('pictures')->findOrFail($id);
        return view('backend.content.album.edit', compact('album'));
    }

    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        $album->title = $request->title;
        $album->details = $request->details;
        $album->is_active = $request->has('is_active') ? 1 : 0;

        if ($request->hasFile('cover_image')) {
            // Delete old cover image if exists
            if ($album->cover_image && file_exists(public_path('setting/banner/' . $album->cover_image))) {
                @unlink(public_path('setting/banner/' . $album->cover_image));
            }
            $coverImage = time() . '_cover.' . $request->cover_image->extension();
            $request->cover_image->move(public_path('setting/banner'), $coverImage);
            $album->cover_image = $coverImage;
        }

        $album->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $imageName = time() . '_' . $key . '.' . $file->extension();
                $file->move(public_path('setting/banner'), $imageName);
                
                AlbumPicture::create([
                    'album_id' => $album->id,
                    'image' => $imageName
                ]);
            }
        }

        return redirect()->route('admin.setting.album.index')->withFlashSuccess('Album Updated Successfully');
    }

    public function deletePicture($id)
    {
        $picture = AlbumPicture::findOrFail($id);
        if (file_exists(public_path('setting/banner/' . $picture->image))) {
            @unlink(public_path('setting/banner/' . $picture->image));
        }
        $picture->delete();

        return redirect()->back()->withFlashSuccess('Picture Deleted Successfully');
    }

    public function destroy($id)
    {
        $album = Album::with('pictures')->findOrFail($id);
        
        if ($album->cover_image && file_exists(public_path('setting/banner/' . $album->cover_image))) {
            @unlink(public_path('setting/banner/' . $album->cover_image));
        }

        foreach ($album->pictures as $picture) {
            if (file_exists(public_path('setting/banner/' . $picture->image))) {
                @unlink(public_path('setting/banner/' . $picture->image));
            }
        }

        $album->delete(); // Cascades in DB

        return redirect()->route('admin.setting.album.index')->withFlashSuccess('Album Deleted Successfully');
    }
}
