<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Frontend\HomeController;

/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__ . '/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__ . '/backend/');
});


Route::get('about', [AboutController::class, 'tech_web_about_index'])->name('about.index');

Route::get('about/committee', [AboutController::class, 'tech_web_about_committee_index'])->name('about.committee.index');
Route::get('about/president', [AboutController::class, 'tech_web_about_president_index'])->name('about.president.index');
Route::get('about/executive_board', [AboutController::class, 'tech_web_about_executive_board_index'])->name('about.executive_board.index');
Route::get('about/secretariat', [AboutController::class, 'tech_web_about_secretariat_index'])->name('about.secretariat.index');
Route::get('about/honorable-members', [AboutController::class, 'tech_web_about_honorable_members_index'])->name('about.honorable_members.index');
Route::get('about/ambassador', [AboutController::class, 'tech_web_about_ambassador_index'])->name('about.ambassador.index');

//Gellery
Route::get('gallery', [HomeController::class, 'allgallery'])->name('gallery.index');

//Appointment

Route::get('appointment', [AboutController::class, 'tech_web_appointment_index'])->name('appointment.index');
Route::post('appointment/store', [AboutController::class, 'tech_web_appointment_store'])->name('appointment.store');



Route::get('history', [HistoryController::class, 'tech_web_history_index'])->name('history.index');
Route::get('traditional-wushu', [HistoryController::class, 'tech_web_traditional_history_index'])->name('traditional.history.index');
Route::get('taolu-wushu', [HistoryController::class, 'tech_web_taolu_history_index'])->name('taolu.history.index');
Route::get('sanda-wushu', [HistoryController::class, 'tech_web_sanda_history_index'])->name('sanda.history.index');


Route::get('competition', [CompetitionController::class, 'tech_web_competition_index'])->name('competition.index');
Route::get('competition/details/{id}', [CompetitionController::class, 'tech_web_competition_details'])->name('competition.details');
Route::get('competition/year/{id}', [CompetitionController::class, 'tech_web_competition_by_year'])->name('competition.year.index');

Route::get('result', [CompetitionController::class, 'tech_web_result_by_year'])->name('result.year.index');



Route::get('team/{type}', [TeamController::class, 'tech_web_team_player'])->name('team.player');
Route::get('teams', [AboutController::class, 'tech_web_team_index'])->name('team.index');
Route::get('member', [AboutController::class, 'tech_web_members_index'])->name('member.index');

Route::get('universities', [UniversityController::class, 'universities'])->name('universities');
Route::get('universities/{id}', [UniversityController::class, 'universitydetails'])->name('universities.details');

// Services
Route::get('service/{id}', function($id){
    $service = \App\Models\Service::where('is_active',1)->findOrFail($id);
    return view('frontend.content.service_show', compact('service'));
})->name('service.show');
