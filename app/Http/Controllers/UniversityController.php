<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\University;
use App\Models\Faq;
use App\Models\Project;

class UniversityController extends Controller
{
    public function index()
    {
        $university = University::get();
        $study_destinations = Project::get();
        return view('backend.content.settings.study_destination.university.index', compact('university', 'study_destinations'));
    }

    public function store(Request $request)
    {
        $university = new University;
        if ($request->banner) {
            $banner = time() . 'banner' . '.' . $request->banner->extension();
            $banner_image = $request->banner->move(public_path('setting/university'), $banner);
        } else {
            $banner = null;
        }
        if ($request->logo) {
            $logo = time() . 'logo' . '.' . $request->logo->extension();
            $logo_image = $request->logo->move(public_path('setting/university'), $logo);
        } else {
            $banner = null;
        }
        if ($request->image1) {
            $image1 = time() . 'image' . '.' . $request->image1->extension();
            $image_1 = $request->image1->move(public_path('setting/university'), $image1);
        } else {
            $image1 = null;
        }
        if ($request->image2) {
            $image2 = time() . 'image2' . '.' . $request->image2->extension();
            $image_2 = $request->image2->move(public_path('setting/university'), $image2);
        } else {
            $image2 = null;
        }
        if ($request->image3) {
            $image3 = time() . 'image3' . '.' . $request->image3->extension();
            $image_3 = $request->image3->move(public_path('setting/university'), $image3);
        } else {
            $image3 = null;
        }

        $university->banner = $banner;
        $university->logo = $logo;
        $university->image1 = $image1;
        $university->image2 = $image2;
        $university->image3 = $image3;
        $university->university_name = $request->university_name ?? null;
        $university->website = $request->website ?? null;
        $university->study_destination_id = $request->study_destination_id ?? null;
        $university->details1 = $request->details1 ?? null;
        $university->details2 = $request->details2 ?? null;
        $university->details3 = $request->details3 ?? null;
        $university->save();
        return redirect()->back()->withFlashSuccess('University Created Successfully');
    }
    public function edit($id)
    {
        $university = University::find($id);
        $study_destinations = Project::get();
        return view('backend.content.settings.study_destination.university.edit', compact('university', 'study_destinations'));
    }
    public function update(Request $request)
    {
        $university = University::find($request->id);
        if ($request->banner) {
            $banner = time() . 'banner' . '.' . $request->banner->extension();
            $banner_image = $request->banner->move(public_path('setting/university'), $banner);
        } else {
            $banner = $university->banner;
        }
        if ($request->logo) {
            $logo = time() . 'logo' . '.' . $request->logo->extension();
            $logo_image = $request->logo->move(public_path('setting/university'), $logo);
        } else {
            $logo = $university->logo;
        }
        if ($request->image1) {
            $image1 = time() . 'image' . '.' . $request->image1->extension();
            $image_1 = $request->image1->move(public_path('setting/university'), $image1);
        } else {
            $image1 = $university->image1;
        }
        if ($request->image2) {
            $image2 = time() . 'image2' . '.' . $request->image2->extension();
            $image_2 = $request->image2->move(public_path('setting/university'), $image2);
        } else {
            $image2 = $university->image2;
        }
        if ($request->image3) {
            $image3 = time() . 'image3' . '.' . $request->image3->extension();
            $image_3 = $request->image3->move(public_path('setting/university'), $image3);
        } else {
            $image3 = $university->image3;
        }

        $university->banner = $banner;
        $university->logo = $logo;
        $university->image1 = $image1;
        $university->image2 = $image2;
        $university->image3 = $image3;
        $university->university_name = $request->university_name ?? $university->university_name;
        $university->website = $request->website ?? $university->website;
        $university->study_destination_id = $request->study_destination_id ?? $university->study_destination_id;
        $university->details1 = $request->details1 ?? $university->details1;
        $university->details2 = $request->details2 ?? $university->details2;
        $university->details3 = $request->details3 ?? $university->details3;
        $university->save();
        return redirect('/admin/university')->withFlashSuccess('University Updated Successfully');
    }

    public function universities()
    {
        $university = University::get();
        $banner = University::latest()->first();
        return view('frontend.content.universities', compact('university', 'banner'));
    }


    public function universitydetails($id)
    {
        $university = University::find($id);
        $universities = University::get();
        return view('frontend.content.universitydetails', compact('universities', 'university'));
    }
}
