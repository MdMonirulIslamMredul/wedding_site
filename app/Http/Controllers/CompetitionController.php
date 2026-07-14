<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\CompetitionYear;
use App\Models\CompetitionType;

class CompetitionController extends Controller
{
    public function tech_web_competition()
    {
        $competition = Competition::get();
        $year = CompetitionYear::get();
        $type = CompetitionType::get();
        return view('backend.content.competition.index', compact('competition', 'year', 'type'));
    }
    public function tech_web_competition_store(Request $request)
    {
        if ($request->banner_image) {
            $banner = time() . 'banner' . '.' . $request->banner_image->extension();
            $banner_image = $request->banner_image->move(public_path('setting/competition'), $banner);
        } else {
            $banner = null;
        }
        if ($request->photo) {
            $photo = time() . 'photo' . '.' . $request->photo->extension();
            $image = $request->photo->move(public_path('setting/competition'), $photo);
        } else {
            $photo = null;
        }
        if ($request->result_file) {
            $result_file = time() . 'result' . '.' . $request->result_file->extension();
            $image = $request->result_file->move(public_path('setting/competition'), $result_file);
        } else {
            $result_file = null;
        }

        $competition = new Competition;
        $competition->year_id = $request->year_id;
        $competition->type_id = $request->type_id;
        $competition->date = $request->date;
        $competition->title = $request->title;
        $competition->address = $request->address;
        $competition->description1 = $request->description1;
        $competition->description2 = $request->description2;
        $competition->description3 = $request->description3;
        $competition->banner_image = $banner;
        $competition->photo = $photo;
        $competition->result_file = $result_file;
        $competition->save();
        return redirect()->back()->withFlashSuccess('Competition Created Successfully');
    }
    public function tech_web_competition_edit($id)
    {
        $competition = Competition::find($id);
        $year = CompetitionYear::get();
        $type = CompetitionType::get();
        return view('backend.content.competition.edit', compact('competition', 'year', 'type'));
    }
    public function tech_web_competition_update(Request $request)
    {
        $competition = Competition::find($request->id);
        if ($request->banner_image) {
            $banner = time() . 'banner' . '.' . $request->banner_image->extension();
            $banner_image = $request->banner_image->move(public_path('setting/competition'), $banner);
        } else {
            $banner = $competition->banner_image;
        }
        if ($request->photo) {
            $photo = time() . 'photo' . '.' . $request->photo->extension();
            $image = $request->photo->move(public_path('setting/competition'), $photo);
        } else {
            $photo = $competition->photo;
        }
        if ($request->result_file) {
            $result_file = time() . 'result' . '.' . $request->result_file->extension();
            $image = $request->result_file->move(public_path('setting/competition'), $result_file);
        } else {
            $result_file = $competition->result_file;
        }
        $competition->year_id = $request->year_id ?? $competition->year_id;
        $competition->type_id = $request->type_id ?? $competition->type_id;
        $competition->date = $request->date ?? $competition->date;
        $competition->title = $request->title ?? $competition->title;
        $competition->address = $request->address ?? $competition->address;
        $competition->description1 = $request->description1 ?? $competition->description1;
        $competition->description2 = $request->description2 ?? $competition->description2;
        $competition->description3 = $request->description3 ?? $competition->description3;
        $competition->banner_image = $banner;
        $competition->photo = $photo;
        $competition->result_file = $result_file;
        $competition->save();
        return redirect('/admin/competition')->withFlashSuccess('Competition Updated Successfully');
    }




    public function tech_web_competition_year()
    {
        $year = CompetitionYear::get();
        return view('backend.content.competition.year.index', compact('year'));
    }
    public function tech_web_competition_year_store(Request $request)
    {
        $year = new CompetitionYear;
        $year->year = $request->year ?? null;
        $year->save();
        return redirect()->back()->withFlashSuccess('Competition Year Created Successfully');
    }
    public function tech_web_competition_year_edit($id)
    {
        $year = CompetitionYear::find($id);
        return view('backend.content.competition.year.edit', compact('year'));
    }
    public function tech_web_competition_year_update(Request $request)
    {
        $year = CompetitionYear::find($request->id);
        $year->year = $request->year ?? null;
        $year->save();
        return redirect('/admin/competition/year')->withFlashSuccess('Competition Year Updated Successfully');
    }



    public function tech_web_competition_type()
    {
        $type = CompetitionType::get();
        return view('backend.content.competition.type.index', compact('type'));
    }
    public function tech_web_competition_type_store(Request $request)
    {
        $type = new CompetitionType;
        $type->type = $request->type ?? null;
        $type->save();
        return redirect()->back()->withFlashSuccess('Competition Type Created Successfully');
    }
    public function tech_web_competition_type_edit($id)
    {
        $type = CompetitionType::find($id);
        return view('backend.content.competition.type.edit', compact('type'));
    }
    public function tech_web_competition_type_update(Request $request)
    {
        $type = CompetitionType::find($request->id);
        $type->type = $request->type ?? null;
        $type->save();
        return redirect('/admin/competition/type')->withFlashSuccess('Competition Type Updated Successfully');
    }




    public function tech_web_competition_by_year($id)
    {
        $competition = Competition::where('year_id', $id)->get();
        $banner = Competition::where('year_id', $id)->latest()->first();
        if ($banner == null) {
            $banner = Competition::latest()->first();
        }
        $year = CompetitionYear::find($id);
        return view('frontend.competition.index', compact('competition', 'banner', 'year'));
    }

    public function tech_web_competition_details($id)
    {
        $competition = Competition::find($id);
        $year = CompetitionYear::where('id', $competition->year_id)->latest()->first();
        return view('frontend.competition.details', compact('competition', 'year'));
    }

    public function tech_web_result_by_year(Request $request)
    {

        $search_year = $request->year;
        $search_type = $request->type ?? null;

        $competitions = Competition::latest();

        $all_year = CompetitionYear::get();
        $s_year = CompetitionYear::get();
        $all_type = CompetitionType::get();
        $s_type = CompetitionType::get();

        if ($search_year) {
            $competitions->where('year_id', $search_year)->orWhere('type_id', $search_type);
            $all_year = CompetitionYear::where('id', $search_year)->get();
        }
        // if ($search_type) {
        //     $competitions->where('type_id', $search_type);
        // }
        $results = $competitions->get();

        $banner = Competition::latest()->first();
        return view('frontend.competition.result.index', compact('results', 'banner', 'all_year', 'all_type', 's_year', 's_type', 'search_type'));
    }
}
