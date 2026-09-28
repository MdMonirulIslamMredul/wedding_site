<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
// use App\Http\Controllers\Frontend\AboutController;

use App\Http\Controllers\Frontend\TrackingController;
use App\Http\Controllers\Frontend\d2dController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */


Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

// New Wedding Pages
Route::get('/portfolio', function() {
    return view('frontend.pages.portfolio');
})->name('portfolio');

Route::get('/cinematography', function() {
    $videos = \App\Models\VideoGallery::where('is_active', 1)->orderBy('id', 'desc')->get();
    return view('frontend.pages.cinematography', compact('videos'));
})->name('cinematography');

// Packages Branch Selector (Dhaka / Chittagong)
Route::get('/packages', function() {
    return view('frontend.pages.packages_branches');
})->name('packages');

// Alias for /branches/package
Route::get('/branches/package', function() {
    return view('frontend.pages.packages_branches');
});

Route::get('/branches/package/{id}', function($id) {
    $loc = ($id == 2 || strtolower($id) === 'chittagong') ? 'chittagong' : 'dhaka';
    return redirect()->route('frontend.packages.location', ['location' => $loc]);
});

// Location-wise packages page
Route::get('/packages/{location}', function($location = 'dhaka') {
    $loc = strtolower($location);
    if (!in_array($loc, ['dhaka', 'chittagong', 'all'])) {
        $loc = 'dhaka';
    }
    
    if ($loc === 'all') {
        $packages = \App\Models\Package::where('is_active', 1)->get();
    } else {
        $packages = \App\Models\Package::where('is_active', 1)
            ->where(function($q) use ($loc) {
                $q->whereRaw('LOWER(location) = ?', [$loc])
                  ->orWhereNull('location')
                  ->orWhere('location', '');
            })->get();
    }

    $categories = \App\Models\PackageCategory::where('is_active', 1)->get();
    return view('frontend.pages.packages', compact('packages', 'categories', 'loc'));
})->name('packages.location');

// Book Us Feature Routes
Route::get('/book_us', [\App\Http\Controllers\BookUsController::class, 'index'])->name('book_us');
Route::post('/book_us/store', [\App\Http\Controllers\BookUsController::class, 'store'])->name('book_us.store');
Route::post('/booking/store', [\App\Http\Controllers\BookUsController::class, 'store'])->name('booking.store');
Route::get('/filter', [\App\Http\Controllers\BookUsController::class, 'filterPackages'])->name('package.filter');
Route::get('/packageDetails', [\App\Http\Controllers\BookUsController::class, 'getPackageDetails'])->name('package.details');


Route::get('notice/details/{id}', [HomeController::class, 'noticedetails']);
Route::get('info/details/{id}', [HomeController::class, 'infodetails']);
Route::get('notice/all', [HomeController::class, 'noticeall']);
Route::get('page/{slug}', [HomeController::class, 'pageshow']);
Route::get('info/all', [HomeController::class, 'infoall']);
Route::get('/donate', [HomeController::class, 'donatenow']);
Route::get('/all/event', [HomeController::class, 'allevent']);
Route::get('/gallery', [HomeController::class, 'allgallery']);
Route::get('/gallery/{id}', [HomeController::class, 'gallerydetails']);
Route::get('/event/details/{id}', [HomeController::class, 'eventdetails']);
Route::get('/study_destination/{id}', [HomeController::class, 'projectdetails']);
Route::get('/service', [HomeController::class, 'servicedetails']);
Route::get('/destination', [HomeController::class, 'destinationindex'])->name('destination');
Route::get('/testimonial', [HomeController::class, 'testimonialindex'])->name('testimonial');
Route::get('/blog/details/{id}', [HomeController::class, 'blogdetails']);
Route::get('/blogs', [HomeController::class, 'blogindex'])->name('blogs');
Route::get('/all/brand', [HomeController::class, 'allbrand']);
Route::get('/all/activities', [HomeController::class, 'allactivities']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact/submit', [HomeController::class, 'contactsubmit'])->name('contact.submit');
// Route::post('/', [HomeController::class, 'contactsubmit'])->name('contact.submit');

Route::post('/event/submit', [HomeController::class, 'eventsubmit']);
Route::post('/volunteer/submit', [HomeController::class, 'volunteersubmit']);
Route::get('/faq', [HomeController::class, 'faqindex'])->name('faq');
Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });

// Route::get('about', [AboutController::class, 'index'])
//     ->name('pages.about')
//     ->breadcrumbs(function (Trail $trail) {
//         $trail->parent('frontend.index')
//             ->push(__('_About'), route('frontend.pages.about'));
//     });


// Route::get('contact', [ContactController::class, 'index'])
//     ->name('pages.contact')
//     ->breadcrumbs(function (Trail $trail) {
//         $trail->parent('frontend.index')
//             ->push(__('_contact'), route('frontend.pages.contact'));
//     });
// Route::post('contact', [ContactController::class, 'store']);



Route::get('/info/{shipped_from}', [HomeController::class, 'index']);
