<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $packageId = $request->input('package_id');
        $isCustom = ($packageId === 'custom' || $request->boolean('is_custom_package'));

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'event_date' => 'required|date',
            'venue' => 'nullable|string|max:255',
            'service_id' => 'required|exists:services,id',
            'package_id' => $isCustom ? 'nullable' : 'required|exists:packages,id',
            'notes' => 'nullable|string'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'event_date' => $request->event_date,
            'venue' => $request->venue,
            'service_id' => $request->service_id,
            'package_id' => $isCustom ? null : $packageId,
            'is_custom_package' => $isCustom,
            'notes' => $request->notes,
        ];

        if ($isCustom) {
            $data['custom_package_details'] = [
                'hours' => $request->input('custom_hours', '6 Hours'),
                'chief_photographers' => $request->input('custom_chief_photographers', '0'),
                'senior_photographers' => $request->input('custom_senior_photographers', '0'),
                'core_photographers' => $request->input('custom_core_photographers', '0'),
                'senior_cinematographers' => $request->input('custom_senior_cinematographers', '0'),
                'core_cinematographers' => $request->input('custom_core_cinematographers', '0'),
                'edited_copies' => $request->input('custom_edited_copies', '150 Copies'),
                'printed_copies' => $request->input('custom_printed_copies', 'None'),
                'photobook' => $request->input('custom_photobook', 'None'),
                'video_duration' => $request->input('custom_video_duration', 'None'),
                'video_trailer' => $request->boolean('custom_video_trailer') ? 'Yes' : 'No',
                'lighting_setup' => $request->input('custom_lighting_setup', 'All Necessary Lighting Setup'),
                'coverage_scope' => $request->input('custom_coverage_scope', 'Venue Only'),
                'drone' => $request->boolean('custom_drone') ? 'Yes' : 'No',
                'pre_wedding' => $request->boolean('custom_pre_wedding') ? 'Yes' : 'No',
                'delivery_method' => $request->input('custom_delivery_method', 'Google Drive / Pendrive'),
            ];
            $data['estimated_price'] = 'Price on Consultation (BDT)';
        }

        \App\Models\Booking::create($data);

        return redirect()->back()->with('success', 'Your booking request has been submitted successfully! Our team will contact you soon.');
    }

    public function adminIndex()
    {
        $bookings = \App\Models\Booking::with('service', 'package')->orderBy('created_at', 'desc')->get();
        return view('backend.content.bookings.index', compact('bookings'));
    }

    public function adminShow($id)
    {
        $booking = \App\Models\Booking::with('service', 'package')->findOrFail($id);
        
        if (!$booking->is_view) {
            $booking->is_view = true;
            $booking->save();
        }

        return view('backend.content.bookings.show', compact('booking'));
    }
}
