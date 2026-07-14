<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Appointment;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.dashboard');
    }

     public function searchappointment(Request $request)
    {
        $query = Appointment::query();
        $status = $request->input('status');

        // Apply status filter only when a concrete status is chosen (not 'all')
        if ($status !== null && $status !== '' && $status !== 'all') {
            if ($status === 'not connected') {
                // Include legacy null statuses as 'not connected'
                $query->where(function($q){
                    $q->whereNull('status')->orWhere('status','not connected');
                });
            } else {
                $query->where('status', $status);
            }
        }

        $appointments = $query->latest()->paginate(10)->appends(
            $status === 'all' || $status === '' ? collect($request->except(['page','status']))->toArray() : $request->except('page')
        );

        return view('backend.content.appointment', compact('appointments'));
    }

    public function updateAppointmentStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->status;
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment status updated successfully!');
    }

    public function search(Request $request)
    {
        $all_orders = $this->orderList();
        $orders = json_decode($all_orders);
        $all_orders = $orders->data->result;

        if ($request->input('itemNO')) {
            // $all_orders->all();
            // $all_orders = $all_orders->where('order_number', 'LIKE', "%" . $request->itemNO . "%")->paginate(20);
        }
        return view('backend.dashboard', compact('all_orders'));
    }
}
