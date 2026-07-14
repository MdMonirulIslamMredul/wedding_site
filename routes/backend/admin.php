<?php

use App\Domains\Contacts\Http\Controllers\ContactController;
use App\Domains\Page\Http\Controllers\PageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Backend\Content\SettingController;
use App\Http\Controllers\Backend\Content\AccountController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('appointment', [DashboardController::class, 'searchappointment'])->name('appointment.search');
Route::post('appointment/{id}/status', [DashboardController::class, 'updateAppointmentStatus'])->name('appointment.updateStatus');



Route::resource('page', PageController::class);

Route::get('university', [UniversityController::class, 'index'])->name('university.index');
Route::get('university/edit/{id}', [UniversityController::class, 'edit'])->name('university.edit');
Route::post('university/update', [UniversityController::class, 'update'])->name('university.update');
Route::post('university/store', [UniversityController::class, 'store'])->name('university.store');


Route::group(['prefix' => 'messaging', 'as' => 'messaging.'], function () {
    Route::resources([
        'contact' => ContactController::class,
    ]);
});

Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
    Route::get('price', [SettingController::class, 'price'])->name('price');
    Route::get('notice', [SettingController::class, 'notice'])->name('notice');
    Route::post('notice/store', [SettingController::class, 'noticestore'])->name('notice.store');
    Route::post('noticecolor/store', [SettingController::class, 'noticecolorstore'])->name('noticecolor.store');
    Route::post('notice/update', [SettingController::class, 'noticeupdate'])->name('notice.update');
    Route::get('notice/edit/{id}', [SettingController::class, 'noticeedit']);

    Route::get('service', [SettingController::class, 'service'])->name('service');
    Route::post('service/store', [SettingController::class, 'servicestore'])->name('service.store');
    Route::post('service/update', [SettingController::class, 'serviceupdate'])->name('service.update');
    Route::get('service/edit/{id}', [SettingController::class, 'serviceedit']);

    Route::get('study_destination', [SettingController::class, 'project'])->name('project');
    Route::post('study_destination/store', [SettingController::class, 'projectstore'])->name('project.store');
    Route::post('study_destination/update', [SettingController::class, 'projectupdate'])->name('project.update');
    Route::get('study_destination/edit/{id}', [SettingController::class, 'projectedit']);

    Route::get('faq', [SettingController::class, 'faq'])->name('faq');
    Route::post('faq/store', [SettingController::class, 'faqstore'])->name('faq.store');
    Route::post('faq/update', [SettingController::class, 'faqupdate'])->name('faq.update');
    Route::get('faq/edit/{id}', [SettingController::class, 'faqedit']);

    // Route::get('study_destination/country', [SettingController::class, 'country'])->name('country');
    // Route::post('study_destination/country/store', [SettingController::class, 'countrystore'])->name('country.store');

    Route::get('blog', [SettingController::class, 'blog'])->name('blog');
    Route::post('blog/store', [SettingController::class, 'blogstore'])->name('blog.store');
    Route::post('blog/update', [SettingController::class, 'blogupdate'])->name('blog.update');
    Route::get('blog/edit/{id}', [SettingController::class, 'blogedit']);

    Route::get('testmony', [SettingController::class, 'testmony'])->name('testmony');
    Route::post('testmony/store', [SettingController::class, 'testmonystore'])->name('testmony.store');
    Route::post('testmony/update', [SettingController::class, 'testmonyupdate'])->name('testmony.update');
    Route::get('testmony/edit/{id}', [SettingController::class, 'testmonyedit']);

    Route::get('slider', [SettingController::class, 'slider'])->name('slider');
    Route::post('slider/store', [SettingController::class, 'sliderstore'])->name('slider.store');
    Route::post('slider/update', [SettingController::class, 'sliderupdate'])->name('slider.update');
    Route::get('slider/edit/{id}', [SettingController::class, 'slideredit']);


    Route::get('event', [SettingController::class, 'event'])->name('event');
    Route::post('event/store', [SettingController::class, 'eventstore'])->name('event.store');
    Route::post('event/update', [SettingController::class, 'eventupdate'])->name('event.update');
    Route::get('event/edit/{id}', [SettingController::class, 'eventedit']);

    Route::get('gallery', [SettingController::class, 'gallery'])->name('gallery');
    Route::post('gallery/store', [SettingController::class, 'gallerystore'])->name('gallery.store');
    Route::post('gallery/update', [SettingController::class, 'galleryupdate'])->name('gallery.update');
    Route::get('gallery/edit/{id}', [SettingController::class, 'galleryedit']);

    Route::get('activity', [SettingController::class, 'activity'])->name('activity');
    Route::post('activity/store', [SettingController::class, 'activitystore'])->name('activity.store');
    Route::post('activity/update', [SettingController::class, 'activityupdate'])->name('activity.update');
    Route::get('activity/edit/{id}', [SettingController::class, 'activityedit']);

    Route::get('brand', [SettingController::class, 'brand'])->name('brand');
    Route::post('brand/store', [SettingController::class, 'brandstore'])->name('brand.store');
    Route::post('brand/update', [SettingController::class, 'brandupdate'])->name('brand.update');
    Route::get('brand/edit/{id}', [SettingController::class, 'brandedit']);

    Route::get('page', [SettingController::class, 'page'])->name('page');
    Route::post('page/store', [SettingController::class, 'pagestore'])->name('page.store');
    Route::post('page/update', [SettingController::class, 'pageupdate'])->name('page.update');
    Route::get('page/edit/{id}', [SettingController::class, 'pageedit']);

    Route::get('info', [SettingController::class, 'info'])->name('info');
    Route::post('info/store', [SettingController::class, 'infostore'])->name('info.store');
    Route::post('info/update', [SettingController::class, 'infoupdate'])->name('info.update');
    Route::get('info/edit/{id}', [SettingController::class, 'infoedit']);

    Route::get('donate', [SettingController::class, 'donate'])->name('donate');
    Route::post('donate/store', [SettingController::class, 'donatestore'])->name('donate.store');
    Route::post('donate/update', [SettingController::class, 'donateupdate'])->name('donate.update');
    Route::get('donate/edit/{id}', [SettingController::class, 'donateedit']);



    Route::post('donates/store', [SettingController::class, 'donatesadd'])->name('donates.store');


    // Route::get('info', [SettingController::class, 'eventsponsor'])->name('eventsponsor');
    Route::post('eventsponsor/store', [SettingController::class, 'eventsponsorstore'])->name('eventsponsor.store');
    Route::post('eventsponsor/update', [SettingController::class, 'eventsponsorupdate'])->name('eventsponsor.update');
    Route::get('eventsponsor/edit/{id}', [SettingController::class, 'eventsponsoredit']);

    Route::post('airShippingStore', [SettingController::class, 'airShippingStore'])->name('airShippingStore');
    Route::post('logo-store', [SettingController::class, 'logoStore'])->name('logoStore');
    Route::post('social-store', [SettingController::class, 'socialStore'])->name('socialStore');
    Route::get('general', [SettingController::class, 'general'])->name('general');
    Route::get('cache-control', [SettingController::class, 'cacheControl'])->name('cache.control');
    Route::post('cache-control-store', [SettingController::class, 'cacheClear'])->name('cache.control.store');
    Route::post('short-message', [SettingController::class, 'shortMessageStore'])->name('short.message.store');
    Route::post('banner-message', [SettingController::class, 'bannerstore'])->name('banner.store');
    Route::post('bottombanner-message', [SettingController::class, 'bottombanner'])->name('bottombanner.store');
    Route::post('about-message', [SettingController::class, 'aboutstore'])->name('about.store');
    Route::post('highlight', [SettingController::class, 'highlightstore'])->name('highlight.store');
    Route::post('work-message', [SettingController::class, 'workstore'])->name('work.store');
    Route::post('api_store', [SettingController::class, 'apiStore'])->name('api.store');
    Route::get('top-notice', [SettingController::class, 'topNoticeCreate'])->name('topNotice.create');
    Route::post('top-notice', [SettingController::class, 'topNoticeStore'])->name('topNotice.store');
    Route::post('homebg', [SettingController::class, 'homebg'])->name('homebg.store');
    Route::post('volunteerSetting', [SettingController::class, 'volunteerSetting'])->name('volunteerSetting.store');
});

// About
Route::get('about/settings', [AboutController::class, 'tech_web_about'])->name('about.settings');
Route::get('about/settings/{id}', [AboutController::class, 'tech_web_about_edit'])->name('about.settings.edit');
Route::post('about/update', [AboutController::class, 'tech_web_about_update'])->name('about.settings.update');
Route::resource('about', AboutController::class);

//mission Vision
Route::get('mission', [AboutController::class, 'tech_web_mission_vision_index'])->name('mission');
Route::get('mission/edit/{id}', [AboutController::class, 'tech_web_mission_vision_edit'])->name('mission.edit');
Route::post('mission/store', [AboutController::class, 'tech_web_mission_vision_store'])->name('mission.store');
Route::post('mission/update', [AboutController::class, 'tech_web_mission_vision_update'])->name('mission.update');

Route::get('/admin/mission/pdf/{filename}', [AboutController::class, 'viewPdf'])->name('mission.view.pdf');

//ServiceArea


Route::get('area',[AboutController::class, 'techweb_area'])->name('area');
Route::post('area/store',[Aboutcontroller::class, 'techweb_area_store'])->name('area.store');
Route::get('area/edit/{id}',[AboutController::class,'techweb_area_edit'])->name('area.edit');
Route::post('area/update',[AboutController::class, 'techweb_area_update'])->name('area.update');

// committee type
Route::get('committee/type', [AboutController::class, 'tech_web_committee_type'])->name('about.committee.type');
Route::post('committee/type', [AboutController::class, 'tech_web_committee_type_store'])->name('about.committee.type.store');
Route::get('committee/type/edit/{id}', [AboutController::class, 'tech_web_committee_type_edit'])->name('about.committee.type.edit');
Route::post('committee/type/update', [AboutController::class, 'tech_web_committee_type_update'])->name('about.committee.type.update');
// committee type end

// committee
Route::get('committee', [AboutController::class, 'tech_web_committee'])->name('about.committee');
Route::post('committee', [AboutController::class, 'tech_web_committee_store'])->name('about.committee.store');
Route::get('committee/edit/{id}', [AboutController::class, 'tech_web_committee_edit'])->name('about.committee.edit');
Route::post('committee/update', [AboutController::class, 'tech_web_committee_update'])->name('about.committee.update');


// committee end

Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
    Route::get('skybuy', [AccountController::class, 'skybuyIndex'])->name('skybuy');
    Route::get('skybuytable', [AccountController::class, 'skybuyTable'])->name('skybuytable');

    Route::get('skyone', [AccountController::class, 'skyoneIndex'])->name('skyone');
    Route::get('skyonetable', [AccountController::class, 'skyoneTable'])->name('skyonetable');
});


Route::get('history', [HistoryController::class, 'tech_web_history'])->name('history.settings');
Route::post('history/store', [HistoryController::class, 'tech_web_history_store'])->name('history.store');
Route::get('history/edit/{id}', [HistoryController::class, 'tech_web_history_edit'])->name('history.settings.edit');
Route::post('history/update', [AboutController::class, 'tech_web_history_update'])->name('history.settings.update');




Route::get('competition', [CompetitionController::class, 'tech_web_competition'])->name('competition.settings');
Route::post('competition', [CompetitionController::class, 'tech_web_competition_store'])->name('competition.store');
Route::get('competition/edit/{id}', [CompetitionController::class, 'tech_web_competition_edit'])->name('competition.edit');
Route::post('competition/update', [CompetitionController::class, 'tech_web_competition_update'])->name('competition.update');

Route::get('competition/year', [CompetitionController::class, 'tech_web_competition_year'])->name('competition.year.settings');
Route::post('competition/year', [CompetitionController::class, 'tech_web_competition_year_store'])->name('competition.year.store');
Route::get('competition/year/edit/{id}', [CompetitionController::class, 'tech_web_competition_year_edit'])->name('competition.year.edit');
Route::post('competition/year/update', [CompetitionController::class, 'tech_web_competition_year_update'])->name('competition.year.update');


Route::get('competition/type', [CompetitionController::class, 'tech_web_competition_type'])->name('competition.type.settings');
Route::post('competition/type', [CompetitionController::class, 'tech_web_competition_type_store'])->name('competition.type.store');
Route::get('competition/type/edit/{id}', [CompetitionController::class, 'tech_web_competition_type_edit'])->name('competition.type.edit');
Route::post('competition/type/update', [CompetitionController::class, 'tech_web_competition_type_update'])->name('competition.type.update');


Route::get('settings/team', [TeamController::class, 'tech_web_team'])->name('team.settings');
Route::post('team/store', [TeamController::class, 'tech_web_team_store'])->name('team.store');
Route::get('team/edit/{id}', [TeamController::class, 'tech_web_team_edit'])->name('team.edit');
Route::post('team/update', [TeamController::class, 'tech_web_team_update'])->name('team.update');
