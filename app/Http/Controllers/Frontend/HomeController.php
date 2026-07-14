<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Products\Models\Product;
use Illuminate\Http\Request;

/**
 * Class HomeController.
 */

use App\Models\Info;
use App\Models\Notice;
use App\Models\Event;
use App\Models\About;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testmony;
use App\Models\Brand;
use App\Models\Donate;
use App\Models\Faq;
use App\Models\Contact;
use App\Models\Activity;
use App\Models\Gallery;
use App\Models\University;
use App\Models\Competition;
use App\Models\CompetitionType;
use App\Models\CompetitionYear;
use App\Models\ServicArea;
use Mail;
use App\Mail\ContactMail;
use App\Mail\EventMail;
use App\Mail\VolentiarMail;

class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $faqs = Faq::where('page_id', 'home')->get();
        $university = University::get();
        $about = About::latest()->first();
        $service_count = 0;
        $product = Product::all();
        $sliders = Slider::where('is_active', 1)
            ->get();

        $projects = Project::where('is_active', 1)
            ->limit(6)->get();

        $competition = Competition::orderBy('id', 'desc')->limit(6)->get();
        $competition_year = CompetitionYear::get();
        $competition_type = CompetitionType::get();

        $services = Service::where('is_active', 1)
            ->get();
        $service_header = Service::where('is_active', 1)
            ->orderBy('updated_at', 'DESC')->first();
        foreach ($services as $service) {
            $service_count += 1;
        }

        $blogs = Blog::where('is_active', 1)->orderBy('id', 'desc')
            ->limit(4)->get();

        $testmonies = Testmony::where('is_active', 1)
            ->get();

        $galary = Gallery::where('is_active', 1)->orderBy('id', 'desc')
            ->limit(6)->get();


        $event = Event::where('status', 1)
            ->take(1)
            ->orderBy('id', 'DESC')
            ->first();

        $brands = Brand::where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();
        $areas = ServicArea::where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();

        return view('frontend.index', compact('faqs', 'university', 'about', 'galary', 'competition', 'competition_year', 'competition_type', 'product', 'sliders', 'event', 'brands', 'services', 'testmonies', 'blogs', 'projects', 'service_count', 'service_header', 'areas'));
    }
     public function servicedetails()
    {
        $banner = Service::where('is_active', 1)->latest()->first();
        $services = Service::where('is_active', 1)->get();
        $areas = ServicArea::where('is_active', 1)->get();
        return view('frontend.content.servicedetails', compact('services','banner','areas'));
    }

    public function noticedetails($id)
    {
        $notice = Notice::find($id);
        return view('frontend.content.noticedetails', compact('notice'));
    }
    public function infodetails($id)
    {
        $info = Info::find($id);

        return view('frontend.content.infodetails', compact('info'));
    }
    public function noticeall()
    {
        $notices = Notice::orderBy('id', 'DESC')->get();
        return view('frontend.content.noticeall', compact('notices'));
    }
    public function donatenow()
    {
        $donates = Donate::where('is_active', 1)
            ->orderBy('title', 'ASC')
            ->get();
        return view('frontend.content.donatenow', compact('donates'));
    }
    public function allevent()
    {
        $events = Event::where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return view('frontend.content.allevent', compact('events'));
    }
    public function allgallery()
    {
        $images = Gallery::where('is_active', 1)->get();
        $banner = Gallery::whereNotNull('banner')->latest()->first();
        return view('frontend.content.allgallery', compact('images', 'banner'));
    }

    public function gallerydetails($id)
    {
        $images = Gallery::find($id);
        $galary = json_decode($images->photos ?? null);
        $banner = Gallery::whereNotNull('banner')->latest()->first();
        return view('frontend.gallery.gallery', compact('images', 'banner', 'galary'));
    }

    public function contact()
    {
        $sliders = Slider::latest()->first();

        return view('frontend.content.contact', compact('sliders'));
    }
    public function contactsubmit(Request $request)
    {
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->qualification = $request->qualification;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->course = $request->interest;
        $contact->country = $request->prefer;
        $contact->message  = $request->message;
        $contact->save();
        return back()->withFlashSuccess('Thank you for your message. It has been sent');
    }


    public function eventsubmit(Request $request)
    {
        $item = $request;
        $adminEmail = get_setting('received_email');
        Mail::to($adminEmail)->send(new EventMail($item));
        return back()->with('status', 'Thank you for your message. It has been sent');
    }
    public function volunteersubmit(Request $request)
    {
        $item = $request;
        $adminEmail = get_setting('received_email');
        Mail::to($adminEmail)->send(new VolentiarMail($item));
        return back()->with('status', 'Thank you for your message. It has been sent');
    }
    public function eventdetails($id)
    {
        $event = Event::find($id);
        return view('frontend.content.eventdetails', compact('event'));
    }

    public function projectdetails($id)
    {
        $faqs = Faq::where('page_id', $id)->get();
        $project = Project::find($id);
        $university = University::where('study_destination_id', $project->id)->get();
        return view('frontend.content.studydestination', compact('faqs', 'project', 'university'));
    }
    public function blogindex()
    {
        $destination = Project::where('is_active', 1)->get();
        $recent = Blog::where('is_active', 1)->orderBy('id', 'desc')
            ->limit(4)->get();
        $blogs = Blog::where('is_active', 1)->get();
        $banner = Blog::whereNotNull('banner')->latest()->first();
        return view('frontend.blog.index', compact('blogs', 'banner', 'destination', 'recent'));
    }
    public function blogdetails($id)
    {

        $blog = Blog::find($id);
        return view('frontend.content.blogdetails', compact('blog'));
    }
    public function infoall()
    {
        $infos = Info::orderBy('id', 'DESC')->get();
        return view('frontend.content.infoall', compact('infos'));
    }
    public function allbrand()
    {
        $brands = Brand::where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return view('frontend.content.allbrand', compact('brands'));
    }
    public function allactivities()
    {

        $activities = Activity::where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();

        return view('frontend.content.allactivities', compact('activities'));
    }
    public function pageshow($slug)
    {
        $slug = '/page/' . $slug;
        $page = Page::where('slug', $slug)->get()->first();
        return view('frontend.content.dynamicpage', compact('page'));
    }

    public function destinationindex()
    {
        $destinations = Project::where('is_active', 1)->get();
        return view('frontend.content.destination', compact('destinations'));
    }

    public function testimonialindex()
    {
        $testmonies = Testmony::where('is_active', 1)->get();
        return view('frontend.content.testimonials', compact('testmonies'));
    }
}
