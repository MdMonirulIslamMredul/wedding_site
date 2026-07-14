<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    public function tech_web_history()
    {
        $history = History::get();
        return view('backend.content.history.index', compact('history'));
    }

    public function tech_web_history_store(Request $request)
    {
        if ($request->banner_image) {
            $banner = time() . 'banner' . '.' . $request->banner_image->extension();
            $banner_image = $request->banner_image->move(public_path('setting/history'), $banner);
        } else {
            $banner = null;
        }

        if ($request->image1) {
            $image1 = time() . 'history1' . '.' . $request->image1->extension();
            $image_1 = $request->image1->move(public_path('setting/history'), $image1);
        } else {
            $image1 = null;
        }
        if ($request->image2) {
            $image2 = time() . 'history2' . '.' . $request->image2->extension();
            $image_2 = $request->image2->move(public_path('setting/history'), $image2);
        } else {
            $image2 = null;
        }
        if ($request->image3) {
            $image3 = time() . 'history3' . '.' . $request->image3->extension();
            $image_3 = $request->image3->move(public_path('setting/history'), $image3);
        } else {
            $image3 = null;
        }
        if ($request->image4) {
            $image4 = time() . 'history4' . '.' . $request->image4->extension();
            $image_4 = $request->image4->move(public_path('setting/history'), $image4);
        } else {
            $image4 = null;
        }
        if ($request->image5) {
            $image5 = time() . 'history5' . '.' . $request->image5->extension();
            $image_5 = $request->image5->move(public_path('setting/history'), $image5);
        } else {
            $image5 = null;
        }
        if ($request->image6) {
            $image6 = time() . 'history6' . '.' . $request->image6->extension();
            $image_6 = $request->image6->move(public_path('setting/history'), $image6);
        } else {
            $image6 = null;
        }
        $history = new History;
        $history->banner_image = $banner;
        $history->image1 = $image1;
        $history->image2 = $image2;
        $history->image3 = $image3;
        $history->image4 = $image4;
        $history->image5 = $image5;
        $history->image6 = $image6;
        $history->description1 = $request->description1;
        $history->description2 = $request->description2;
        $history->description3 = $request->description3;
        $history->description4 = $request->description4;
        $history->description5 = $request->description5;
        $history->description6 = $request->description6;
        $history->link = $request->link;
        $history->section = $request->section;
        $history->save();
        return redirect()->back()->withFlashSuccess('History Created Successfully');
    }

    public function tech_web_history_edit($id)
    {
        $history = History::find($id);
        return view('backend.content.history.edit', compact('history'));
    }


    public function tech_web_history_update(Request $request)
    {
        $history = History::find($request->id);

        if ($request->banner_image) {
            $banner = time() . 'banner' . '.' . $request->banner_image->extension();
            $banner_image = $request->banner_image->move(public_path('setting/history'), $banner);
        } else {
            $banner = $history->banner_image;
        }

        if ($request->image1) {
            $image1 = time() . 'history1' . '.' . $request->image1->extension();
            $image_1 = $request->image1->move(public_path('setting/history'), $image1);
        } else {
            $image1 = $history->image1;
        }
        if ($request->image2) {
            $image2 = time() . 'history2' . '.' . $request->image2->extension();
            $image_2 = $request->image2->move(public_path('setting/history'), $image2);
        } else {
            $image2 = $history->image2;
        }
        if ($request->image3) {
            $image3 = time() . 'history3' . '.' . $request->image3->extension();
            $image_3 = $request->image3->move(public_path('setting/history'), $image3);
        } else {
            $image3 = $history->image3;
        }
        if ($request->image4) {
            $image4 = time() . 'history4' . '.' . $request->image4->extension();
            $image_4 = $request->image4->move(public_path('setting/history'), $image4);
        } else {
            $image4 = $history->image4;
        }
        if ($request->image5) {
            $image5 = time() . 'history5' . '.' . $request->image5->extension();
            $image_5 = $request->image5->move(public_path('setting/history'), $image5);
        } else {
            $image5 = $history->image5;
        }
        if ($request->image6) {
            $image6 = time() . 'history6' . '.' . $request->image6->extension();
            $image_6 = $request->image6->move(public_path('setting/history'), $image6);
        } else {
            $image6 = $history->image6;
        }
        $history->banner_image = $banner;
        $history->image1 = $image1;
        $history->image2 = $image2;
        $history->image3 = $image3;
        $history->image4 = $image4;
        $history->image5 = $image5;
        $history->image6 = $image6;
        $history->description1 = $request->description1 ?? $history->description1;
        $history->description2 = $request->description2 ?? $history->description2;
        $history->description3 = $request->description3 ?? $history->description3;
        $history->description4 = $request->description4 ?? $history->description4;
        $history->description5 = $request->description5 ?? $history->description5;
        $history->description6 = $request->description6 ?? $history->description6;
        $history->link = $request->link ?? $history->link;
        $history->section = $request->section ?? $history->section;
        $history->save();
        return redirect()->back()->withFlashSuccess('History Updated Successfully');
    }

    public  function tech_web_history_index()
    {
        $history = History::where('section', 'history')->latest()->first();
        return view('frontend.history.history.index', compact('history'));
    }
    public  function tech_web_traditional_history_index()
    {
        $history = History::where('section', 'traditional')->latest()->first();
        return view('frontend.history.traditional.index', compact('history'));
    }
    public  function tech_web_taolu_history_index()
    {
        $history = History::where('section', 'taolu')->latest()->first();
        return view('frontend.history.taolu.index', compact('history'));
    }
    public  function tech_web_sanda_history_index()
    {
        $history = History::where('section', 'sanda')->latest()->first();
        return view('frontend.history.sanda.index', compact('history'));
    }
}
