@extends('backend.layouts.app')
@section('title', __('Booking Details'))

@section('content')

    <x-backend.card>
        <x-slot name="header">
            <h4>Booking Details - {{ $booking->name }}</h4>
        </x-slot>
        <x-slot name="headerActions">
            <x-utils.link class="card-header-action btn btn-sm btn-secondary text-white" :href="route('admin.bookings.index')" :text="__('Back')" />
        </x-slot>

        <x-slot name="body">
            <table class="table table-striped table-bordered">
                <tr>
                    <th width="20%">Name</th>
                    <td>{{ $booking->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $booking->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $booking->phone }}</td>
                </tr>
                <tr>
                    <th>Event Date</th>
                    <td>{{ \Carbon\Carbon::parse($booking->event_date)->format('M d, Y') }}</td>
                </tr>
                <tr>
                    <th>Venue / Location</th>
                    <td>{{ $booking->venue ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Service Needed</th>
                    <td>{{ $booking->service->title ?? $booking->service->name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Package Selection</th>
                    <td>
                        @if($booking->is_custom_package)
                            <span class="badge badge-warning text-dark font-weight-bold" style="font-size: 0.9rem; padding: 6px 12px; background-color: #ffc107;">Custom Package</span>
                            <span class="badge badge-info ml-2" style="font-size: 0.85rem;">Price on Consultation (BDT)</span>
                        @else
                            {{ $booking->package->title ?? $booking->package->name ?? 'None selected' }}
                        @endif
                    </td>
                </tr>

                @if($booking->is_custom_package && is_array($booking->custom_package_details))
                <tr>
                    <th>Custom Package Facilities</th>
                    <td>
                        <table class="table table-sm table-bordered mt-2 bg-light">
                            <tr>
                                <th width="35%">Coverage Duration:</th>
                                <td><strong>{{ $booking->custom_package_details['hours'] ?? 'N/A' }}</strong></td>
                            </tr>
                            <tr>
                                <th>Chief Photographers:</th>
                                <td>{{ $booking->custom_package_details['chief_photographers'] ?? '0' }}</td>
                            </tr>
                            <tr>
                                <th>Senior Photographers:</th>
                                <td>{{ $booking->custom_package_details['senior_photographers'] ?? '0' }}</td>
                            </tr>
                            <tr>
                                <th>Core Photographers:</th>
                                <td>{{ $booking->custom_package_details['core_photographers'] ?? '0' }}</td>
                            </tr>
                            <tr>
                                <th>Senior Cinematographers:</th>
                                <td>{{ $booking->custom_package_details['senior_cinematographers'] ?? '0' }}</td>
                            </tr>
                            <tr>
                                <th>Core Cinematographers:</th>
                                <td>{{ $booking->custom_package_details['core_cinematographers'] ?? '0' }}</td>
                            </tr>
                            <tr>
                                <th>Edited Soft Copies:</th>
                                <td>{{ $booking->custom_package_details['edited_copies'] ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Printed Copies:</th>
                                <td>{{ $booking->custom_package_details['printed_copies'] ?? 'None' }}</td>
                            </tr>
                            <tr>
                                <th>Photobook Selection:</th>
                                <td>{{ $booking->custom_package_details['photobook'] ?? 'None' }}</td>
                            </tr>
                            <tr>
                                <th>Full HD Video (1080P):</th>
                                <td>{{ $booking->custom_package_details['video_duration'] ?? 'None' }}</td>
                            </tr>
                            <tr>
                                <th>Exclusive Video Trailer:</th>
                                <td><span class="badge {{ ($booking->custom_package_details['video_trailer'] ?? '') === 'Yes' ? 'badge-success' : 'badge-secondary' }}">{{ $booking->custom_package_details['video_trailer'] ?? 'No' }}</span></td>
                            </tr>
                            <tr>
                                <th>Lighting Setup:</th>
                                <td>{{ $booking->custom_package_details['lighting_setup'] ?? 'All Necessary Lighting Setup' }}</td>
                            </tr>
                            <tr>
                                <th>Drone Aerial Coverage:</th>
                                <td><span class="badge {{ ($booking->custom_package_details['drone'] ?? '') === 'Yes' ? 'badge-success' : 'badge-secondary' }}">{{ $booking->custom_package_details['drone'] ?? 'No' }}</span></td>
                            </tr>
                            <tr>
                                <th>Pre-Wedding Shoot:</th>
                                <td><span class="badge {{ ($booking->custom_package_details['pre_wedding'] ?? '') === 'Yes' ? 'badge-success' : 'badge-secondary' }}">{{ $booking->custom_package_details['pre_wedding'] ?? 'No' }}</span></td>
                            </tr>
                            <tr>
                                <th>Delivery Method:</th>
                                <td>{{ $booking->custom_package_details['delivery_method'] ?? 'Google Drive / Pendrive' }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endif
                <tr>
                    <th>Additional Notes</th>
                    <td>{{ $booking->notes ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Submitted At</th>
                    <td>{{ $booking->created_at->format('M d, Y h:i A') }}</td>
                </tr>
            </table>
        </x-slot>
    </x-backend.card>

@endsection
