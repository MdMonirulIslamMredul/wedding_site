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
