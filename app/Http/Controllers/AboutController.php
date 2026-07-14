<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Appointment;
use App\Models\About;
use App\Models\Brand;
use App\Models\ServicArea;
use App\Models\Committee;
use App\Models\CommitteeType;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function tech_web_about_index()
    {
        $about = About::latest()->first();
        $mission=Mission::latest()->first();
        $brands = Brand::all();
        return view('frontend.about.index', compact('about','mission','brands'));
    }
    public function tech_web_about()
    {
        $about = About::latest()->first();
        return view('backend.content.about.index', compact('about'));
    }

    public function tech_web_mission_vision_index()
    {
        $items = Mission::latest()->get();
        return view('backend.content.mission.index', compact('items'));
    }

        public function tech_web_team_index()
    {
        $about = About::latest()->first();
        $team=Committee::all();
        $banner= null;
        return view('frontend.team.index', compact('about','team','banner'));
    }

    public function store(Request $request)
    {
        if ($request->id) {
            $about = About::find($request->id);
        } else {
            $about = new About;
        }
        if ($request->banner_image) {
            $banner = time() . 'banner' . '.' . $request->banner_image->extension();
            $banner_image = $request->banner_image->move(public_path('setting/about'), $banner);
        } else {
            $banner = null;
        }
        if ($request->about_image) {
            $about_p = time() . 'about' . '.' . $request->about_image->extension();
            $about_image = $request->about_image->move(public_path('setting/about'), $about_p);
        } else {
            $about_p = null;
        }
        $about->banner_img = $banner;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->short_description = $request->short_description;
        $about->about_image = $about_p;
        $about->save();
        return redirect()->back()->withFlashSuccess('About Created Successfully');
    }

    public function tech_web_about_edit($id)
    {
        $about = About::find($id);
        return view('backend.content.about.edit', compact('about'));
    }
    public function tech_web_about_update(Request $request)
    {
        $id = $request->about_id;
        $about = About::find($id);

        if ($request->banner_image != null) {
            $banner = time() . 'banner' . '.' . $request->banner_image->extension();
            $banner_image = $request->banner_image->move(public_path('setting/about'), $banner);
        } else {
            $banner = $about->banner_img;
        }
        if ($request->about_image != null) {
            $about_p = time() . 'about' . '.' . $request->about_image->extension();
            $about_image = $request->about_image->move(public_path('setting/about'), $about_p);
        } else {
            $about_p = $about->about_image;
        }
        $about->banner_img = $banner;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->short_description = $request->short_description;
        $about->about_image = $about_p;
        $about->save();
        return redirect('/admin/about/settings')->withFlashSuccess('About Updated Successfully');
    }

    // committee type
    public function tech_web_committee_type()
    {
        $type = CommitteeType::get();
        return view('backend.content.about.committee.type.index', compact('type'));
    }
    public function tech_web_committee_type_edit($id)
    {
        $type = CommitteeType::find($id);
        return view('backend.content.about.committee.type.edit', compact('type'));
    }
    public function tech_web_committee_type_store(Request $request)
    {
        $type = new CommitteeType;
        $type->type = $request->type ?? null;
        $type->save();
        return redirect('/admin/committee/type')->withFlashSuccess('Committee Type Created Successfully');
    }
    public function tech_web_committee_type_update(Request $request)
    {
        $type = CommitteeType::find($request->id);
        $type->type = $request->type ?? null;
        $type->save();
        return redirect('/admin/committee/type')->withFlashSuccess('Committee Type Updated Successfully');
    }
    // committee type end









//appointment


    public function tech_web_appointment_index(){
         $about = About::latest()->first();
        return view('frontend.content.appointment', compact('about'));
    }


    public function tech_web_appointment_store(Request $request){

        $appointment= new Appointment;
        $appointment->name=$request->name?? null;
        $appointment->phone=$request->phone?? null;
        $appointment->car_model=$request->car_model?? null;
        $appointment->date=$request->date?? null;
        $appointment->time=$request->time?? null;
        $appointment->service_type=$request->service_type?? null;
        $appointment->note=$request->note?? null;
        $appointment->save();
     return redirect()->route('appointment.index')->with('success', 'Appointment booked successfully!');
    }


    // committee

    public function tech_web_committee()
    {
        $type = CommitteeType::get();
        $committees = Committee::get();
        return view('backend.content.about.committee.index', compact('type', 'committees'));
    }

    public function tech_web_committee_store(Request $request)
    {
        if ($request->photo) {
            $photo = time() . 'photo' . '.' . $request->photo->extension();
            $committee_photo = $request->photo->move(public_path('setting/committee'), $photo);
        } else {
            $photo = null;
        }
        $committee = new Committee;
        $committee->name = $request->name ?? null;
        $committee->type_id = $request->type_id ?? null;
        $committee->details = $request->details ?? null;
        $committee->position = $request->position ?? null;
        $committee->description = $request->description ?? null;
        $committee->has_description = $request->has_description ?? null;
        $committee->serial = $request->serial ?? null;
        $committee->color = $request->color ?? null;
        $committee->section = $request->section ?? null;
        $committee->photo = $photo;
        $committee->save();
        return redirect('/admin/committee')->withFlashSuccess('Committee Created Successfully');
    }
    public function tech_web_committee_edit($id)
    {
        $type = CommitteeType::get();
        $committee = Committee::find($id);
        return view('backend.content.about.committee.edit', compact('committee', 'type'));
    }

    public function tech_web_committee_update(Request $request)
    {
        $committee = Committee::find($request->id);
        if ($request->photo) {
            $photo = time() . 'photo' . '.' . $request->photo->extension();
            $committee_photo = $request->photo->move(public_path('setting/committee'), $photo);
        } else {
            $photo = $committee->photo;
        }
        $committee->name = $request->name ?? $committee->name;
        $committee->type_id = $request->type_id ?? $committee->type_id;
        $committee->details = $request->details ?? $committee->details;
        $committee->position = $request->position ?? $committee->position;
        $committee->description = $request->description ?? $committee->description;
        $committee->has_description = $request->has_description ?? $committee->has_description;
        $committee->serial = $request->serial ?? $committee->serial;
        $committee->color = $request->color ?? $committee->color;
        $committee->section = $request->section ?? $committee->section;
        $committee->photo = $photo;
        $committee->save();
        return redirect('/admin/committee')->withFlashSuccess('Committee Updated Successfully');
    }
    // committee end



    // committee frontend
    public  function tech_web_about_committee_index()
    {
        $type = CommitteeType::get();
        $committees = Committee::where('section', 'committees')->get();
        $about = About::latest()->first();
        return view('frontend.about.committee.index', compact('type', 'committees', 'about'));
    }
    // committee frontend end


    public  function tech_web_about_president_index()
    {
        $type = CommitteeType::get();
        $committees = Committee::where('section', 'president')->get();
        $about = About::latest()->first();
        return view('frontend.about.president.index', compact('type', 'committees', 'about'));
    }
    public  function tech_web_about_executive_board_index()
    {
        $type = CommitteeType::get();
        $committees = Committee::where('section', 'executive-board')->get();
        $about = About::latest()->first();
        return view('frontend.about.executive_board.index', compact('type', 'committees', 'about'));
    }
    public  function tech_web_about_secretariat_index()
    {
        $type = CommitteeType::get();
        $committees = Committee::where('section', 'secretariat')->get();
        $about = About::latest()->first();
        return view('frontend.about.secretariat.index', compact('type', 'committees', 'about'));
    }
    public  function tech_web_about_honorable_members_index()
    {
        $type = CommitteeType::get();
        $committees = Committee::where('section', 'honorable-members')->get();
        $about = About::latest()->first();
        return view('frontend.about.member.index', compact('type', 'committees', 'about'));
    }
    public  function tech_web_about_ambassador_index()
    {
        $type = CommitteeType::get();
        $committees = Committee::where('section', 'honorable-members')->get();
        $about = About::latest()->first();
        return view('frontend.about.ambassador.index', compact('type', 'committees', 'about'));
    }




//mission
public function tech_web_mission_vision_store(Request $request)
{
    $request->validate([
        'mission_vision' => 'nullable|string',
        'text'           => 'nullable|string',
        'pdf_file'       => 'nullable|file|mimes:pdf|max:10240',
        'portfolio'      => 'nullable|file|mimes:pdf|max:10240',
        'id'             => 'nullable|integer|exists:mission_visions,id',
    ]);

    $mission = $request->filled('id')
        ? Mission::findOrFail($request->id)
        : new Mission;

    // Handle PDF upload
    if ($request->hasFile('pdf_file')) {
        if (!empty($mission->pdf_file) && file_exists(public_path('setting/mission/'.$mission->pdf_file))) {
            @unlink(public_path('setting/mission/'.$mission->pdf_file));
        }
        $pdfName = time().'_mission.'.$request->file('pdf_file')->extension();
        $request->file('pdf_file')->move(public_path('setting/mission'), $pdfName);
        $mission->pdf_file = $pdfName;
    }

    // Handle Portfolio upload
    if ($request->hasFile('portfolio')) {
        if (!empty($mission->portfolio) && file_exists(public_path('setting/mission/'.$mission->portfolio))) {
            @unlink(public_path('setting/mission/'.$mission->portfolio));
        }
        $portfolioName = time().'_portfolio.'.$request->file('portfolio')->extension();
        $request->file('portfolio')->move(public_path('setting/mission'), $portfolioName);
        $mission->portfolio = $portfolioName;
    }

    $mission->mission_vision = $request->mission;
    $mission->text = $request->vision;

    $mission->save();

    return back()->withFlashSuccess('Mission saved successfully.');
}

public function tech_web_mission_vision_edit($id)
{
    $mission = Mission::findOrFail($id);
    return view('backend.content.mission.edit', compact('mission'));
}

public function tech_web_mission_vision_update(Request $request)
{
    $request->validate([
        'id'         => 'required|integer|exists:mission_visions,id',
        'mission'    => 'nullable|string',
        'text'       => 'nullable|string',
        'pdf_file'   => 'nullable|file|mimes:pdf|max:10240',
        'portfolio'  => 'nullable|file|mimes:pdf|max:10240',
    ]);

    $mission = Mission::findOrFail($request->id);

    // Handle PDF upload
    if ($request->hasFile('pdf_file')) {
        if (!empty($mission->pdf_file) && file_exists(public_path('setting/mission/'.$mission->pdf_file))) {
            @unlink(public_path('setting/mission/'.$mission->pdf_file));
        }
        $pdfName = time().'_mission.'.$request->file('pdf_file')->extension();
        $request->file('pdf_file')->move(public_path('setting/mission'), $pdfName);
        $mission->pdf_file = $pdfName;
    }

    // Handle Portfolio upload
    if ($request->hasFile('portfolio')) {
        if (!empty($mission->portfolio) && file_exists(public_path('setting/mission/'.$mission->portfolio))) {
            @unlink(public_path('setting/mission/'.$mission->portfolio));
        }
        $portfolioName = time().'_portfolio.'.$request->file('portfolio')->extension();
        $request->file('portfolio')->move(public_path('setting/mission'), $portfolioName);
        $mission->portfolio = $portfolioName;
    }

    $mission->mission_vision = $request->mission;
    $mission->text = $request->text;
    $mission->save();

    return redirect('admin/mission')->withFlashSuccess('Mission updated successfully.');
}

public function viewPdf($filename)
{
    $path = public_path('setting/mission/' . $filename);

    if (!file_exists($path)) {
        abort(404, 'File not found.');
    }

    return response()->file($path, [
        'Content-Type' => 'application/pdf',
    ]);
}



//service Area

 public function techweb_area()
    {
        $serviceareas = ServicArea::latest()->get();
        return view('backend.content.settings.servicearea.index', compact('serviceareas'));
    }


public function techweb_area_store(Request $request)
{
    $request->validate([
        'areaname' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'description' => 'nullable|string',
    ]);

    $data = $request->only('areaname', 'description');

    if ($request->hasFile('image')) {
        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('setting/banner'), $filename);
        $data['image'] = 'setting/banner/' . $filename;
    }

    ServicArea::create($data);

    return redirect()->route('admin.area')->with('success', 'Service Area created successfully.');
}





public function techweb_area_update(Request $request)
{
    $id = $request->id;

    $area = ServicArea::find($id);
    if (!$area) {
        return redirect()->back()->withErrors('Service Area not found.');
    }

    // Handle image upload
    if ($request->hasFile('image')) {
        $newImageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('setting/banner'), $newImageName);
        $area->image = 'setting/banner/' . $newImageName;
    } else {
        // Keep old image if no new image uploaded
        $area->image = $request->oldimage;
    }

    // Update other fields
    $area->areaname = $request->areaname;
    $area->description = $request->description;
    $area->is_active = $request->is_active;
    $area->save();

    return redirect()->route('admin.area')->with('success', 'Service Area updated successfully');
}





public function techweb_area_edit($id)
{
    $area = ServicArea::find($id);

    return view('backend.content.settings.servicearea.edite', compact('area'));
}

      public function techweb_mission(Request $request)
    {

       $about = Mission::latest()->first();
        return view('backend.content.mission.index', compact('about'));


    }





}
