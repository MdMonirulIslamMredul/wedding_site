@extends('backend.layouts.app')
@section('title', __('Booking Requests'))

@section('content')

    <x-backend.card>
        <x-slot name="header">
            <h4>Booking Requests</h4>
        </x-slot>

        <x-slot name="body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Event Date</th>
                            <th>Package</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>
                                    {{ $booking->name }}
                                    @if(!$booking->is_view)
                                        <span class="badge badge-danger">New</span>
                                    @endif
                                </td>
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->phone }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->event_date)->format('M d, Y') }}</td>
                                <td>
                                    @if($booking->is_custom_package)
                                        <span class="badge badge-warning text-dark" style="background-color: #ffc107;">Custom</span>
                                    @else
                                        {{ $booking->package->name ?? 'Standard' }}
                                    @endif
                                </td>
                                <td>
                                    @if($booking->is_view)
                                        <span class="badge badge-success">Viewed</span>
                                    @else
                                        <span class="badge badge-warning">Unread</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No booking requests found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </x-slot>
    </x-backend.card>

@endsection
