<?php

namespace App\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Setting;
use App\Models\Info;
use App\Models\Page;
use App\Models\Brand;
use App\Models\Sponsor;
use App\Models\Blog;
use App\Models\CompetitionType;
use App\Models\Activity;
use App\Models\Donate;
use App\Models\Notice;
use App\Models\Slider;
use App\Models\Event;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testmony;
use App\Models\Faq;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{

  public function general()
  {
    return view('backend.content.settings.general.general');
  }

  public function logoStore(Request $request)
  {
    if (\request()->hasFile('frontend_logo_menu')) {
      $data['frontend_logo_menu'] = store_picture(\request()->file('frontend_logo_menu'), 'setting/logo');
    }
    if (\request()->hasFile('affiliate_logo')) {
      $data['affiliate_logo'] = store_picture(\request()->file('affiliate_logo'), 'setting/logo');
    }
    if (\request()->hasFile('frontend_logo_footer')) {
      $data['frontend_logo_footer'] = store_picture(\request()->file('frontend_logo_footer'), 'setting/logo');
    }
    if (\request()->hasFile('admin_logo')) {
      $data['admin_logo'] = store_picture(\request()->file('admin_logo'), 'setting/logo');
    }
    if (\request()->hasFile('favicon')) {
      $data['favicon'] = store_picture(\request()->file('favicon'), 'setting/logo');
    }
    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Logo Updated Successfully');
  }
  public function bannerstore(Request $request)
  {

    if (\request()->hasFile('banner_image')) {

      $data['banner_image'] = store_picture(\request()->file('banner_image'), 'setting/logo');
      Setting::save_settings($data);
    }
    if (\request()->hasFile('banner_image_back')) {

      $data['banner_image_back'] = store_picture(\request()->file('banner_image_back'), 'setting/logo');
      Setting::save_settings($data);
    }


    $data = \request()->only(['banner_link', 'banner_color_1', 'banner_color_2', 'banner_color_3', 'banner_text_header', 'banner_text_bottom']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Banner section Updated Successfully');
  }
  public function highlightstore(Request $request)
  {

    if (\request()->hasFile('highlight_image_1')) {

      $data['highlight_image_1'] = store_picture(\request()->file('highlight_image_1'), 'setting/logo');
      Setting::save_settings($data);
    }
    if (\request()->hasFile('highlight_image_2')) {

      $data['highlight_image_2'] = store_picture(\request()->file('highlight_image_2'), 'setting/logo');
      Setting::save_settings($data);
    }
    if (\request()->hasFile('highlight_image_3')) {

      $data['highlight_image_3'] = store_picture(\request()->file('highlight_image_3'), 'setting/logo');
      Setting::save_settings($data);
    }


    $data = \request()->only(['bg_color_1', 'text_color_1', 'highlight_header_1', 'highlight_description_1', 'bg_color_2', 'text_color_2', 'highlight_header_2', 'highlight_description_2', 'bg_color_3', 'text_color_3', 'highlight_header_3', 'highlight_description_3']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Highlight section Updated Successfully');
  }
  public function bottombanner(Request $request)
  {

    if (\request()->hasFile('bottombanner_image')) {

      $data['bottombanner_image'] = store_picture(\request()->file('bottombanner_image'), 'setting/logo');
      Setting::save_settings($data);
    }

    $data = \request()->only(['bottombanner_text_bottom', 'event_btn_color', 'event_btn_des', 'event_btn_name']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Bottom Banner section Updated Successfully');
  }
  public function noticecolorstore(Request $request)
  {

    if (\request()->hasFile('notice_image')) {

      $data['notice_image'] = store_picture(\request()->file('notice_image'), 'setting/logo');
      Setting::save_settings($data);
    }

    $data = \request()->only(['notice_color_1', 'notice_color_2', 'notice_color_3']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Bottom Banner section Updated Successfully');
  }
  public function aboutstore(Request $request)
  {

    if (\request()->hasFile('about_image_1')) {

      $data['about_image_1'] = store_picture(\request()->file('about_image_1'), 'setting/logo');
      Setting::save_settings($data);
    }


    $data = \request()->only(['about_color_1', 'about_color_2', 'about_color_3', 'about_text_header', 'about_text_bottom', 'about_text_details']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Brand section Updated Successfully');
  }
  public function volunteerSetting(Request $request)
  {

    $data = \request()->only(['volunteer_title', 'volunteer_description']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Volunteer section Updated Successfully');
  }
  public function apiStore(Request $request)
  {

    $data = \request()->only(['api_url', 'api_email', 'api_password']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Api section Updated Successfully');
  }
  public function workstore(Request $request)
  {

    if (\request()->hasFile('work_image_1')) {

      $data['work_image_1'] = store_picture(\request()->file('work_image_1'), 'setting/logo');
      Setting::save_settings($data);
    }
    $data = \request()->only(['work_text_header']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Activity section Updated Successfully');
  }
  public function homebg(Request $request)
  {

    if (\request()->hasFile('volunteer_bg_image')) {

      $data['volunteer_bg_image'] = store_picture(\request()->file('volunteer_bg_image'), 'setting/logo');
      Setting::save_settings($data);
    }
    $data = \request()->only(['about_bg_color', 'event_bg_color', 'brand_bg_color']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Home section Background  Color Updated Successfully');
  }
  public function donatesadd(Request $request)
  {
    if (\request()->hasFile('donates_image_1')) {

      $data['donates_image_1'] = store_picture(\request()->file('donates_image_1'), 'setting/logo');
      Setting::save_settings($data);
    }


    $data = \request()->only(['donates_text_header', 'donates_title_bg_color', 'cash', 'bank']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Donate section Updated Successfully');
  }

  public function socialStore(Request $request)
  {
    $data = request()->all();
    unset($data['_token']);

    if (\request()->hasFile('meta_image')) {
      $data['meta_image'] = store_picture(\request()->file('meta_image'), 'setting/meta');
    }

    if (\request()->hasFile('invoice_logo')) {
      $data['invoice_logo'] = store_picture(\request()->file('invoice_logo'), 'setting/logo');
    }


    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Setting Updated Successfully');
  }


  public function price()
  {
    return view('backend.content.settings.price-setting');
  }
  public function notice()
  {
    return view('backend.content.settings.notice.index');
  }
  public function noticestore(Request $request)
  {
    foreach ($request->title  as $key => $title) {
      $newImageName = time() . '.' . $request->multiimage[$key]->extension();
      $image = $request->multiimage[$key]->move(public_path('setting/banner'), $newImageName);
      $notice = new Notice;
      $notice->image = $newImageName;
      $notice->title = $request->title[$key];
      $notice->description = $request->description[$key];
      $notice->save();
    }

    return redirect()->back()->withFlashSuccess('Notice Store Successfully');
  }
  public function noticeedit($id)
  {
    $notice = DB::table('notices')->find($id);
    return view('backend.content.settings.notice.edit', compact('notice'));
  }

  public function noticeupdate(Request $request)
  {
    $id = $request->notice_id;
    if ($request->image) {
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }
    $notice = Notice::find($id);
    $notice->image = $newImageName;
    $notice->title = $request->title;
    $notice->description = $request->description;
    $notice->is_active = $request->is_active;
    $notice->save();
    return redirect('/admin/setting/notice')->withFlashSuccess('Notice Updated Successfully');;
  }
  public function info()
  {
    return view('backend.content.settings.info.index');
  }
  public function infostore(Request $request)
  {
    foreach ($request->title  as $key => $title) {
      $newImageName = time() . '.' . $request->multiimage[$key]->extension();
      $image = $request->multiimage[$key]->move(public_path('setting/banner'), $newImageName);
      $info = new Info;
      $info->image = $newImageName;
      $info->title = $request->title[$key];
      $info->description = $request->description[$key];
      $info->save();
    }

    return redirect()->back()->withFlashSuccess('Notice Store Successfully');
  }
  public function infoedit($id)
  {
    $notice = DB::table('infos')->find($id);
    return view('backend.content.settings.info.edit', compact('notice'));
  }

  public function infoupdate(Request $request)
  {
    $id = $request->notice_id;
    if ($request->image) {
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }
    $info = Info::find($id);
    $info->image = $newImageName;
    $info->title = $request->title;
    $info->description = $request->description;
    $info->is_active = $request->is_active;
    $info->save();

    return redirect('/admin/setting/info')->withFlashSuccess('Notice Updated Successfully');;
  }
  public function page()
  {
    return view('backend.content.settings.page.index');
  }
  public function pagestore(Request $request)
  {
    $newImageName = time() . '.' . $request->image->extension();
    $image = $request->image->move(public_path('setting/banner'), $newImageName);
    $page = new Page;
    $page->image = $newImageName;
    $page->title = $request->title;
    $page->slug = $request->slug;
    $page->bgcolor = $request->bgcolor;
    $page->hearder = $request->hearder;
    $page->footer_left = $request->footer_left;
    $page->footer_right = $request->footer_right;
    $page->description = $request->description;
    $page->description_a = $request->description2;
    $page->description_b = $request->description3;
    $page->description_c = $request->description4;
    $page->save();
    return redirect()->back()->withFlashSuccess('Page Create Successfully');
  }
  public function pageedit($id)
  {
    $notice = DB::table('pages')->find($id);
    return view('backend.content.settings.page.edit', compact('notice'));
  }

  public function pageupdate(Request $request)
  {
    $id = $request->notice_id;
    if ($request->image) {
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }
    $page = Page::find($id);
    $page->image = $newImageName;
    $page->title = $request->title;
    $page->slug = $request->slug;
    $page->bgcolor = $request->bgcolor;
    $page->hearder = $request->hearder;
    $page->footer_left = $request->footer_left;
    $page->footer_right = $request->footer_right;
    $page->description = $request->description;
    $page->description_a = $request->description2;
    $page->description_b = $request->description3;
    $page->description_c = $request->description4;
    $page->is_active = $request->is_active;
    $page->save();

    return redirect('/admin/setting/page')->withFlashSuccess('Notice Updated Successfully');;
  }
  public function limit()
  {
    return view('backend.content.settings.order-limit-setting');
  }


  public function limitationStore()
  {
    $data = request()->all();
    unset($data['_token']);

    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Setting Updated Successfully');
  }


  public function message()
  {
    return view('backend.content.settings.message-setting');
  }


  public function messageStore()
  {
    $sms = \request('sms') ? 'sms_' : '';
    if ($sms) {
      $data['sms_active_otp_message'] = \request('sms_active_otp_message', null);
      $data['sms_otp_message'] = \request('sms_otp_message', null);
    }
    $data[$sms . 'active_waiting_for_payment'] = \request($sms . 'active_waiting_for_payment', null);
    $data[$sms . 'waiting_for_payment'] = \request($sms . 'waiting_for_payment', null);
    $data[$sms . 'active_partial_paid'] = \request($sms . 'active_partial_paid', null);
    $data[$sms . 'partial_paid'] = \request($sms . 'partial_paid', null);
    $data[$sms . 'active_purchased_message'] = \request($sms . 'active_purchased_message', null);
    $data[$sms . 'purchased_message'] = \request($sms . 'purchased_message', null);
    $data[$sms . 'active_shipped_from_suppliers'] = \request($sms . 'active_shipped_from_suppliers', null);
    $data[$sms . 'shipped_from_suppliers'] = \request($sms . 'shipped_from_suppliers', null);
    $data[$sms . 'active_received_in_china_warehouse'] = \request($sms . 'active_received_in_china_warehouse', null);
    $data[$sms . 'received_in_china_warehouse'] = \request($sms . 'received_in_china_warehouse', null);
    $data[$sms . 'active_shipped_from_china_warehouse'] = \request($sms . 'active_shipped_from_china_warehouse', null);
    $data[$sms . 'shipped_from_china_warehouse'] = \request($sms . 'shipped_from_china_warehouse', null);
    $data[$sms . 'active_received_in_bd_warehouse'] = \request($sms . 'active_received_in_bd_warehouse', null);
    $data[$sms . 'received_in_bd_warehouse'] = \request($sms . 'received_in_bd_warehouse', null);
    $data[$sms . 'active_on_transit_to_customer'] = \request($sms . 'active_on_transit_to_customer', null);
    $data[$sms . 'on_transit_to_customer'] = \request($sms . 'on_transit_to_customer', null);
    $data[$sms . 'active_delivered_completed'] = \request($sms . 'active_delivered_completed', null);
    $data[$sms . 'delivered_completed'] = \request($sms . 'delivered_completed', null);
    $data[$sms . 'active_adjustment'] = \request($sms . 'active_adjustment', null);
    $data[$sms . 'adjustment'] = \request($sms . 'adjustment', null);
    $data[$sms . 'active_canceled_by_seller'] = \request($sms . 'active_canceled_by_seller', null);
    $data[$sms . 'canceled_by_seller'] = \request($sms . 'canceled_by_seller', null);
    $data[$sms . 'active_out_of_stock'] = \request($sms . 'active_out_of_stock', null);
    $data[$sms . 'out_of_stock'] = \request($sms . 'out_of_stock', null);
    $data[$sms . 'active_refunded'] = \request($sms . 'active_refunded', null);
    $data[$sms . 'refunded'] = \request($sms . 'refunded', null);

    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Message Updated Successfully');
  }


  public function airShippingStore()
  {
    $shipping = request('shipping');
    $data['air_shipping_charges'] = json_encode($shipping);
    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Shipping Charges Updated Successfully');
  }


  public function cacheControl()
  {
    $files = Storage::files('browsing');
    $displayInfo = [];
    foreach ($files as $file) {
      $explode_file = explode('_', $file);
      if (count($explode_file) == 3) {

        $date = $explode_file[0];
        $date = str_replace('browsing/', '', $date);
        $name = $explode_file[1];

        $selectFile = true;
        if (in_array('fullInfo', $explode_file)) {
          if (strtotime($date) < strtotime(date('Y-m-d-H'))) {
            Storage::delete($file);
            $selectFile = false;
          }
        } else {
          if (strtotime($date) < strtotime(date('Y-m-d'))) {
            Storage::delete($file);
            $selectFile = false;
          }
        }
        if ($selectFile) {
          $displayInfo[] = [
            'date' => $date,
            'name' => $name,
            'size' => Storage::size($file),
            'file' => $file,
          ];
        }
      } else {
        Storage::delete($file);
      }
    }

    $displayInfo = collect($displayInfo)->sortByDesc('date');

    return view('backend.content.settings.cache-control', compact('displayInfo'));
  }

  public function cacheClear()
  {
    $clearType = \request('type');
    if (Storage::exists($clearType)) {
      Storage::delete($clearType);
      Cache::forget('settings'); // remove setting cache
      return redirect()->back()->withFlashWarning('Browsing Cache Remove Successfully');
    }
    return redirect()->back()->withFlashDanger('Cache Type Not Found');
  }

  public function threeColumnBanner()
  {
    return view('backend.content.settings.banner-right');
  }


  public function bannerRightStore()
  {
    $data = request()->only('left_banner_image_link', 'middle_banner_image_link', 'right_banner_image_link');

    $rightBanner = json_decode(get_setting('three_column_banners'));

    if (\request()->hasFile('left_banner_image')) {
      $data['left_banner_image'] = store_picture(\request()->file('left_banner_image'), 'setting/banner');
    } else {
      $data['left_banner_image'] = $rightBanner->top_image ?? null;
    }
    if (\request()->hasFile('middle_banner_image')) {
      $data['middle_banner_image'] = store_picture(\request()->file('middle_banner_image'), 'setting/banner');
    } else {
      $data['middle_banner_image'] = $rightBanner->top_image ?? null;
    }
    if (\request()->hasFile('right_banner_image')) {
      $data['right_banner_image'] = store_picture(\request()->file('right_banner_image'), 'setting/banner');
    } else {
      $data['right_banner_image'] = $rightBanner->top_image ?? null;
    }

    Setting::save_settings(['three_column_banners' => json_encode($data)]);

    return redirect()->back()->withFlashSuccess('Three column banner image set successfully');
  }


  public function topNoticeCreate()
  {
    return view('backend.content.settings.top-notice');
  }

  public function topNoticeStore()
  {
    $active = request('top_notice_text_active');
    $top_notice_text = request('top_notice_text');

    $data['top_notice_text_active'] = null;
    if ($active) {
      $data['top_notice_text_active'] = $active;
    }
    $data['top_notice_text'] = $top_notice_text;

    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Top Notice Updated  Successfully');
  }

  public function createImageLoader()
  {
    return view('backend.content.settings.image-loader-setting');
  }

  public function storeImageLoader()
  {
    $data = [];
    if (\request()->hasFile('banner_image_loader')) {
      $data['banner_image_loader'] = store_picture(\request()->file('banner_image_loader'), 'setting/loader');
    }

    if (\request()->hasFile('category_image_loader')) {
      $data['category_image_loader'] = store_picture(\request()->file('category_image_loader'), 'setting/loader');
    }

    if (\request()->hasFile('sub_category_image_loader')) {
      $data['sub_category_image_loader'] = store_picture(\request()->file('sub_category_image_loader'), 'setting/loader');
    }

    if (\request()->hasFile('product_image_loader')) {
      $data['product_image_loader'] = store_picture(\request()->file('product_image_loader'), 'setting/loader');
    }

    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Loading Image Store Successfully');
  }

  public function rightBannerStore()
  {
    $data = request()->only('banner_right_link1');
    if (\request()->hasFile('banner_right_1')) {
      $data['banner_right_1'] = store_picture(\request()->file('banner_right_1'), 'setting/banner');
    }

    Setting::save_settings($data);

    return redirect()->back()->withFlashSuccess('Right Banner Store Successfully');
  }


  public function shortMessageStore()
  {
    $data = \request()->only(['approx_weight_message', 'china_local_delivery_message', 'china_to_bd_bottom_message', 'china_to_bd_bottom_message_2nd', 'order_summary_bottom_message', 'payment_summary_bottom_message']);
    Setting::save_settings($data);
    return redirect()->back()->withFlashSuccess('Short Message\'s Updated  Successfully');
  }

  public function faq()
  {
    $faq = Faq::get();
    $destination = Project::get();
    return view('backend.content.faq.index', compact('faq', 'destination'));
  }
  public function faqstore(Request $request)
  {
    $faq = new Faq();
    $faq->question = $request->question ?? null;
    $faq->answer = $request->answer ?? null;
    $faq->page_id = $request->page_id ?? null;
    $faq->save();
    return redirect()->back()->withFlashSuccess('FAQ Store Successfully');
  }

  public function faqedit($id)
  {
    $faq = Faq::find($id);
    $destination = Project::get();
    return view('backend.content.faq.edit', compact('faq', 'destination'));
  }
  public function faqupdate(Request $request)
  {
    $faq = Faq::find($request->id);
    $faq->question = $request->question ?? null;
    $faq->answer = $request->answer ?? null;
    $faq->page_id = $request->page_id ?? null;
    $faq->is_active = $request->is_active;
    $faq->save();
    return redirect('/admin/setting/faq')->withFlashSuccess('FAQ Updated Successfully');
  }

  public function testmony()
  {
    $testmony = Testmony::get();
    return view('backend.content.settings.testmony.index', compact('testmony'));
  }

  public function testmonystore(Request $request)
  {
    if ($request->photo) {
      $photo = time() . 'photo' . '.' . $request->photo->extension();
      $photo1 = $request->photo->move(public_path('setting/testmony'), $photo);
    } else {
      $photo = null;
    }
    $slider = new Testmony();
    $slider->reviewer = $request->reviewer ?? null;
    $slider->photo = $photo ?? null;
    $slider->reviewer_job = $request->reviewer_job ?? null;
    $slider->review = $request->review ?? null;
    $slider->save();
    return redirect()->back()->withFlashSuccess('Testmony Store Successfully');
  }

  public function testmonyedit($id)
  {
    $notice = DB::table('testmonies')->find($id);
    return view('backend.content.settings.testmony.edit', compact('notice'));
  }

  public function testmonyupdate(Request $request)
  {
    $id = $request->notice_id;
    if ($request->photo) {
      $photo = time() . 'photo' . '.' . $request->photo->extension();
      $photo1 = $request->photo->move(public_path('setting/testmony'), $photo);
    } else {
      $photo = null;
    }
    $slider = Testmony::find($id);
    $slider->reviewer = $request->reviewer;
    $slider->photo = $photo ?? null;
    $slider->reviewer_job = $request->reviewer_job ?? null;
    $slider->review = $request->review ?? null;
    $slider->is_active = $request->is_active;
    $slider->save();
    return redirect('/admin/setting/testmony')->withFlashSuccess('Testmony Updated Successfully');;
  }



  public function blog()
  {
    $blogs = Blog::get();
    return view('backend.content.settings.blog.index', compact('blogs'));
  }
  public function blogstore(Request $request)
  {
    if ($request->banner) {
      $banner = time() . 'banner' . '.' . $request->banner->extension();
      $blogbanner = $request->banner->move(public_path('setting/blog'), $banner);
    } else {
      $banner = null;
    }

    if ($request->image1) {
      $newImageName1 = time() . 'image1' . '.' . $request->image1->extension();
      $image1 = $request->image1->move(public_path('setting/blog'), $newImageName1);
    } else {
      $newImageName1 = null;
    }
    if ($request->image2) {
      $newImageName2 = time() . 'image2' . '.' . $request->image2->extension();
      $image3 = $request->image2->move(public_path('setting/blog'), $newImageName2);
    } else {
      $newImageName2 = null;
    }
    $blog = new Blog;
    $blog->title = $request->title;
    $blog->short_details = $request->short_details;
    $blog->image1 = $newImageName1;
    $blog->image2 = $newImageName2;
    $blog->banner = $banner;
    $blog->details1 = $request->details1;
    $blog->details2 = $request->details2;
   

    $blog->save();

    return redirect()->back()->withFlashSuccess('Blog Store Successfully');
  }
  public function blogedit($id)
  {
    $blog = DB::table('blogs')->find($id);
    return view('backend.content.settings.blog.edit', compact('blog'));
  }
  public function blogupdate(Request $request)
  {
    $blog = Blog::find($request->id);
    if ($request->banner) {
      $banner = time() . 'banner' . '.' . $request->banner->extension();
      $blogbanner = $request->banner->move(public_path('setting/blog'), $banner);
    } else {
      $banner = $blog->banner;
    }

    if ($request->image1) {
      $newImageName1 = time() . 'image1' . '.' . $request->image1->extension();
      $image1 = $request->image1->move(public_path('setting/blog'), $newImageName1);
    } else {
      $newImageName1 = $blog->image1;
    }
    if ($request->image2) {
      $newImageName2 = time() . 'image2' . '.' . $request->image2->extension();
      $image3 = $request->image2->move(public_path('setting/blog'), $newImageName2);
    } else {
      $newImageName2 = $blog->image2;
    }
    $blog->title = $request->title;
    $blog->short_details = $request->short_details;
    $blog->image1 = $newImageName1 ?? null;
    $blog->image2 = $newImageName2 ?? null;
    $blog->banner = $banner ?? null;
    $blog->details1 = $request->details1;
    $blog->details2 = $request->details2;
     $blog->is_active = $request->is_active;

    $blog->save();

    return redirect('/admin/setting/blog')->withFlashSuccess('Blog Updated Successfully');
  }



  public function service()
  {
    $service = Service::get();
    return view('backend.content.settings.service.index', compact('service'));
  }
  public function servicestore(Request $request)
  {
    if ($request->banner != null) {
      $banner = time() . 'banner' . '.' . $request->banner->extension();
      $servicebanner = $request->banner->move(public_path('setting/service'), $banner);
    }
    if ($request->image1 != null) {
      $newImageName1 = time() . 'image1' . '.' . $request->image1->extension();
      $image1 = $request->image1->move(public_path('setting/service'), $newImageName1);
    }
    if ($request->image2 != null) {
      $newImageName2 = time() . 'image2' . '.' . $request->image2->extension();
      $image2 = $request->image2->move(public_path('setting/service'), $newImageName2);
    }
    if ($request->image3 != null) {
      $newImageName3 = time() . 'image3' . '.' . $request->image3->extension();
      $image3 = $request->image3->move(public_path('setting/service'), $newImageName3);
    }
    $service = new Service();
    $service->image1 = $newImageName1 ?? null;
    $service->image2 = $newImageName2 ?? null;
    $service->image3 = $newImageName3 ?? null;
    $service->banner = $banner ?? null;
    $service->title = $request->title ?? null;
    $service->details1 = $request->details1 ?? null;
    $service->details2 = $request->details2 ?? null;
    $service->details3 = $request->details3 ?? null;
    $service->save();


    return redirect()->back()->withFlashSuccess('Service Store Successfully');
  }
  public function serviceedit($id)
  {
    $service = Service::find($id);
    return view('backend.content.settings.service.edit', compact('service'));
  }

  public function serviceupdate(Request $request)
  {
    $service = Service::find($request->id);
    if ($request->banner != null) {
      $banner = time() . 'banner' . '.' . $request->banner->extension();
      $servicebanner = $request->banner->move(public_path('setting/service'), $banner);
    } else {
      $banner = $service->banner;
    }
    if ($request->image1 != null) {
      $newImageName1 = time() . 'image1' . '.' . $request->image1->extension();
      $image1 = $request->image1->move(public_path('setting/service'), $newImageName1);
    } else {
      $newImageName1 = $service->image1;
    }
    if ($request->image2 != null) {
      $newImageName2 = time() . 'image2' . '.' . $request->image2->extension();
      $image2 = $request->image2->move(public_path('setting/service'), $newImageName2);
    } else {
      $newImageName2 = $service->image2;
    }
    if ($request->image3 != null) {
      $newImageName3 = time() . 'image3' . '.' . $request->image3->extension();
      $image3 = $request->image3->move(public_path('setting/service'), $newImageName3);
    } else {
      $newImageName3 = $service->image3;
    }

    $service->image1 = $newImageName1 ?? null;
    $service->image2 = $newImageName2 ?? null;
    $service->image3 = $newImageName3 ?? null;
    $service->banner = $banner ?? null;
    $service->title = $request->title ?? null;
    $service->details1 = $request->details1 ?? null;
    $service->details2 = $request->details2 ?? null;
    $service->details3 = $request->details3 ?? null;
    $service->is_active=$request->is_active;
    $service->save();

    return redirect('/admin/setting/service')->withFlashSuccess('Service Updated Successfully');;
  }


  public function project()
  {
    return view('backend.content.settings.study_destination.index');
  }
  public function projectstore(Request $request)
  {

    foreach ($request->title  as $key => $title) {
      if ($request->image != null) {
        $newImageName = time() . '.' . $request->image[$key]->extension();
        $image = $request->image[$key]->move(public_path('setting/banner'), $newImageName);
      }
      if ($request->image2 != null) {
        $newImageName2 = time() . 'img2' . '.' . $request->image2[$key]->extension();
        $image2 = $request->image2[$key]->move(public_path('setting/banner'), $newImageName2);
      }
      if ($request->image3 != null) {
        $newImageName3 = time() . 'img3' . '.' . $request->image3[$key]->extension();
        $image = $request->image3[$key]->move(public_path('setting/banner'), $newImageName3);
      }
      if ($request->banner != null) {
        $banner = time() . 'banner' . '.' . $request->banner[$key]->extension();
        $ban = $request->banner[$key]->move(public_path('setting/banner'), $banner);
      }
      $slider = new Project;
      $slider->banner = $banner ?? null;
      $slider->image = $newImageName ?? null;
      $slider->image2 = $newImageName2 ?? null;
      $slider->image3 = $newImageName3 ?? null;
      $slider->title = $request->title[$key] ?? null;
      $slider->details_title = $request->details_title[$key] ?? null;
      $slider->short_details = $request->short_details[$key] ?? null;
      $slider->details = $request->details[$key] ?? null;
      $slider->details_description = $request->details_description[$key] ?? null;
      $slider->details_description2 = $request->details_description2[$key] ?? null;
      $slider->status = $request->status[$key] ?? null;

      // if ($request->hasFile('photos')) {
      //   $files = $request->file('photos');
      //   $i = 1;
      //   $photogalary = [];
      //   foreach ($files as $key => $file) {
      //     $service = time() . $i . '.'  . $file->extension();
      //     $photo = $file->move(public_path('setting/banner'), $service);
      //     $photogalary[] = $service;
      //     $i++;
      //   }
      //   $galary = json_encode($photogalary);
      // }

      // $slider->photos = $galary ?? null;
      $slider->save();
    }

    return redirect()->back()->withFlashSuccess('Project Store Successfully');
  }
  public function projectedit($id)
  {
    $notice = Project::find($id);
    return view('backend.content.settings.study_destination.edit', compact('notice'));
  }

  public function projectupdate(Request $request)
  {
    $id = $request->notice_id;
    $slider = Project::find($id);
    if ($request->image) {
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $slider->image;
    }

    if ($request->image2 != null) {
      $newImageName2 = time() . 'img2' . '.' . $request->image2->extension();
      $image2 = $request->image2->move(public_path('setting/banner'), $newImageName2);
    } else {
      $newImageName2 = $slider->image2;
    }

    if ($request->image3 != null) {
      $newImageName3 = time() . 'img3' . '.' . $request->image3->extension();
      $image = $request->image3->move(public_path('setting/banner'), $newImageName3);
    } else {
      $newImageName2 = $slider->image3;
    }

    if ($request->banner != null) {
      $banner = time() . 'banner' . '.' . $request->banner->extension();
      $ban = $request->banner->move(public_path('setting/banner'), $banner);
    } else {
      $banner = $slider->banner;
    }

    $slider->banner = $banner ?? null;
    $slider->image = $newImageName ?? null;
    $slider->image2 = $newImageName2 ?? null;
    $slider->image3 = $newImageName3 ?? null;
    $slider->title = $request->title ?? null;
    $slider->details_title = $request->details_title ?? null;
    $slider->short_details = $request->short_details ?? null;
    $slider->details = $request->details ?? null;
    $slider->details_description = $request->details_description ?? null;
    $slider->details_description2 = $request->details_description2 ?? null;
    $slider->status = $request->status ?? null;
    $slider->is_active = $request->is_active;
    // if ($request->hasFile('photos')) {
    //   $files = $request->file('photos');
    //   $i = 1;
    //   $photogalary = [];
    //   foreach ($files as $key => $file) {
    //     $service = time() . $i . '.'  . $file->extension();
    //     $photo = $file->move(public_path('setting/banner'), $service);
    //     $photogalary[] = $service;
    //     $i++;
    //   }
    //   $galary = json_encode($photogalary);
    //   $slider->photos = $galary ?? null;
    // } else {
    //   $slider->photos = $slider->photos;
    // }
    $slider->save();
    return redirect('/admin/setting/study_destination')->withFlashSuccess('Project Updated Successfully');
  }



  public function slider()
  {
    return view('backend.content.settings.slider.index');
  }
  public function sliderstore(Request $request)
  {
    foreach ($request->title  as $key => $title) {
      $newImageName = time() . '.' . $request->image[$key]->extension();
      $image = $request->image[$key]->move(public_path('setting/banner'), $newImageName);
      $slider = new Slider;
      $slider->image = $newImageName;
      $slider->header_title = $request->title[$key];
      $slider->bottom_title = $request->bottom_title[$key];
      $slider->save();
    }

    return redirect()->back()->withFlashSuccess('Notice Store Successfully');
  }
  public function slideredit($id)
  {
    $notice = DB::table('sliders')->find($id);
    return view('backend.content.settings.slider.edit', compact('notice'));
  }

  public function sliderupdate(Request $request)
  {
    $id = $request->notice_id;
    $slider = Slider::find($id);
    if ($request->image) {
      $newImageName = time() . 'slider' . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $slider->image;
    }

    $slider->image = $newImageName;
    $slider->header_title = $request->header_title;
    $slider->bottom_title = $request->bottom_title;
    $slider->is_active = $request->is_active;
    $slider->save();
    return redirect('/admin/setting/slider')->withFlashSuccess('Slider Updated Successfully');;
  }
  public function event()
  {
    return view('backend.content.settings.event.index');
  }
  public function eventstore(Request $request)
  {
    if ($request->banner_image) {
      $newImageName = time() . '.' . $request->banner_image->extension();
      $image = $request->banner_image->move(public_path('setting/banner'), $newImageName);
    }

    $event = new Event;
    $event->image = $newImageName;
    $event->sort_para = $request->sort_para;
    $event->title = $request->title;
    $event->date = $request->date;
    $event->description = $request->description;
    $event->facility = $request->facility;
    $event->map = $request->map;
    $event->organized_by = $request->organized_by;
    $event->start = $request->start;
    $event->venue = $request->venue;
    $event->email = $request->email;
    $event->phone = $request->phone;
    $event->eventMission = $request->eventMission;
    $event->ourVission = $request->ourVission;
    $event->eventVission = $request->eventVission;
    $event->event_title_1 = $request->event_title_1;
    $event->event_title_2 = $request->event_title_2;
    $event->event_title_3 = $request->event_title_3;
    if ($request->single_event_banner) {
      $single_event_banner = time() . '.' . $request->single_event_banner->extension();
      $image = $request->single_event_banner->move(public_path('setting/banner'), $single_event_banner);
    }
    $event->single_event_banner = $single_event_banner;
    $event->save();


    return redirect()->back()->withFlashSuccess('Eveent Store Successfully');
  }
  public function eventedit($id)
  {
    $notice = DB::table('events')->find($id);
    return view('backend.content.settings.event.edit', compact('notice'));
  }

  public function eventupdate(Request $request)
  {
    $id = $request->event_id;
    if ($request->image) {
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }

    $event = Event::find($id);
    $event->image = $newImageName;
    $event->sort_para = $request->sort_para;
    $event->title = $request->title;
    $event->date = $request->date;
    $event->description = $request->description;
    $event->facility = $request->facility;
    $event->map = $request->map;
    $event->organized_by = $request->organized_by;
    $event->start = $request->start;
    $event->venue = $request->venue;
    $event->email = $request->email;
    $event->phone = $request->phone;
    $event->event_title_1 = $request->event_title_1;
    $event->event_title_2 = $request->event_title_2;
    $event->event_title_3 = $request->event_title_3;
    $event->eventMission = $request->eventMission;
    $event->ourVission = $request->ourVission;
    $event->eventVission = $request->eventVission;
    if ($request->single_event_banner) {
      $single_event_banner = time() . '.' . $request->single_event_banner->extension();
      $image = $request->single_event_banner->move(public_path('setting/banner'), $single_event_banner);
      $event->single_event_banner = $single_event_banner;
    } else {
      $event->single_event_banner = $request->oldsingle_event_banner;
    }
    $event->is_active = $request->is_active;
    $event->status = $request->status;
    $event->save();
    return redirect('/admin/setting/event')->withFlashSuccess('Event Updated Successfully');;
  }
  // gallery start
  public function gallery()
  {
    $competition = CompetitionType::get();
    return view('backend.content.settings.gallery.index', compact('competition'));
  }
  public function gallerystore(Request $request)
  {
    if ($request->image) {
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    }
    if ($request->banner) {
      $newImageName1 = time() . '.' . $request->banner->extension();
      $image = $request->banner->move(public_path('setting/banner'), $newImageName1);
    }
    if ($request->hasFile('photos')) {
      $files = $request->file('photos');
      $i = 1;
      $photogalary = [];
      foreach ($files as $key => $file) {
        $service = time() . $i . '.'  . $file->extension();
        $photo = $file->move(public_path('setting/banner'), $service);
        $photogalary[] = $service;
        $i++;
      }
      $galary = json_encode($photogalary);
    }
    $gallery = new Gallery;
    $gallery->image = $newImageName;
    $gallery->banner = $newImageName1 ?? null;
    $gallery->photos = $galary ?? null;
    $gallery->details = $request->details ?? null;
    $gallery->competition_id = $request->competition_id ?? null;
    // $gallery->competition_id = $request->year_id ?? null;

    $gallery->save();


    return redirect()->back()->withFlashSuccess('Gallery Store Successfully');
  }
  public function galleryedit($id)
  {
    $notice = Gallery::find($id);
    $competition = CompetitionType::get();
    return view('backend.content.settings.gallery.edit', compact('notice', 'competition'));
  }

  public function galleryupdate(Request $request)
  {
    $id = $request->gallery_id;
    if ($request->image) {
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }
    if ($request->banner) {
      $newImageName1 = time() . '.' . $request->banner->extension();
      $image = $request->banner->move(public_path('setting/banner'), $newImageName1);
    }
    if ($request->hasFile('photos')) {
      $files = $request->file('photos');
      $i = 1;
      $photogalary = [];
      foreach ($files as $key => $file) {
        $service = time() . $i . '.'  . $file->extension();
        $photo = $file->move(public_path('setting/banner'), $service);
        $photogalary[] = $service;
        $i++;
      }
      $galary = json_encode($photogalary);
    }
    $gallery = Gallery::find($id);
    $gallery->image = $newImageName;
    $gallery->banner = $newImageName1 ?? $gallery->banner;
    $gallery->photos = $galary ??  $gallery->photos;
    $gallery->details = $request->details ?? $gallery->details;
    $gallery->competition_id = $request->competition_id ?? $gallery->competition_id;
    $gallery->is_active = $request->is_active;
    $gallery->save();
    return redirect('/admin/setting/gallery')->withFlashSuccess('gallery Updated Successfully');
  }
  // gallery end
  // activity start
  public function activity()
  {

    return view('backend.content.settings.activity.index');
  }
  public function activitystore(Request $request)
  {
    if ($request->banner_image) {
      $newImageName = time() . '.' . $request->banner_image->extension();
      $image = $request->banner_image->move(public_path('setting/banner'), $newImageName);
    }

    $activity = new Activity;
    $activity->image = $newImageName;
    $activity->sort_para = $request->sort_para;
    $activity->title = $request->title;
    $activity->save();
    return redirect()->back()->withFlashSuccess('Activity Store Successfully');
  }

  public function activityedit($id)
  {
    $notice = Activity::find($id);
    return view('backend.content.settings.activity.edit', compact('notice'));
  }

  public function activityupdate(Request $request)
  {
    $id = $request->activity_id;
    if ($request->image) {
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }

    $activity = Activity::find($id);
    $activity->image = $newImageName;
    $activity->sort_para = $request->sort_para;
    $activity->title = $request->title;
    $activity->is_active = $request->is_active;
    $activity->save();
    return redirect('/admin/setting/activity')->withFlashSuccess('Activity Updated Successfully');;
  }
  // activity end

  // donate start
  public function donate()
  {

    return view('backend.content.settings.donate.index');
  }
  public function donatestore(Request $request)
  {
    if ($request->banner_image) {
      $newImageName = time() . '.' . $request->banner_image->extension();
      $image = $request->banner_image->move(public_path('setting/banner'), $newImageName);
    }

    $activity = new Donate;
    $activity->image = $newImageName;
    $activity->link = $request->link;
    $activity->title = $request->title;
    $activity->color = $request->color;
    $activity->save();
    return redirect()->back()->withFlashSuccess('donate Store Successfully');
  }

  public function donateedit($id)
  {
    $notice = Donate::find($id);
    return view('backend.content.settings.donate.edit', compact('notice'));
  }

  public function donateupdate(Request $request)
  {
    $id = $request->activity_id;
    if ($request->image) {
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/banner'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }

    $activity = Donate::find($id);
    $activity->image = $newImageName;
    $activity->link = $request->link;
    $activity->title = $request->title;
    $activity->is_active = $request->is_active;
    $activity->color = $request->color;
    $activity->save();
    return redirect('/admin/setting/donate')->withFlashSuccess('donate Updated Successfully');;
  }
  // donate end


  // brand start
  public function brand()
  {
    return view('backend.content.settings.brand.index');
  }
  public function brandstore(Request $request)
  {
    if ($request->banner_image) {
      $newImageName = time() . '.' . $request->banner_image->extension();
      $image = $request->banner_image->move(public_path('setting/brand'), $newImageName);
    }

    $brand = new Brand;
    $brand->logo = $newImageName;
    $brand->title = $request->title;
    $brand->save();

    return redirect()->back()->withFlashSuccess('Brand Store Successfully');
  }
  public function brandedit($id)
  {
    $notice = DB::table('brands')->find($id);
    return view('backend.content.settings.brand.edit', compact('notice'));
  }

  public function brandupdate(Request $request)
  {
    $id = $request->brand_id;
    if ($request->image) {
      $newImageName = time() . '.' . $request->image->extension();
      $image = $request->image->move(public_path('setting/brand'), $newImageName);
    } else {
      $newImageName = $request->oldimage;
    }

    $brand = Brand::find($id);
    $brand->logo = $newImageName;
    $brand->title = $request->title;
    $brand->is_active = $request->is_active;
    $brand->save();
    return redirect('/admin/setting/brand')->withFlashSuccess('Brand Updated Successfully');;
  }
  // brand end

  // sponser start
  public function eventsponsorstore(Request $request)
  {

    $check = Sponsor::where('sponsor_id', $request->sponsor_id)->where('event_id', $request->event_sponsor_id)->first();
    if ($check) {
      return redirect()->back()->withFlashSuccess('Sponsor Already Exiting');
    } else {
      $sponsor = new Sponsor;
      $sponsor->event_id = $request->event_sponsor_id;
      $sponsor->sponsor_id = $request->sponsor_id;
      $sponsor->save();
      return redirect()->back()->withFlashSuccess('Sponsor Store Successfully');
    }
  }
  public function eventsponsoredit($id)
  {
    $notice = DB::table('sponsors')->find($id);
    return view('backend.content.settings.event.sponsoredit', compact('notice'));
  }

  public function eventsponsorupdate(Request $request)
  {
    $id = $request->sponsor_id;


    $sponsor = Sponsor::find($id);
    $sponsor->is_active = $request->is_active;
    $sponsor->save();
    return back()->withFlashSuccess('Sponsor Updated Successfully');;
  }
  // sponser end
}
