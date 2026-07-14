@extends('backend.layouts.app')
@section('title', __('Dashboard'))

@section('content')
<x-backend.card>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Appointment Details</h1>
            <div class="appointment-stats">
                {{-- <span class="badge badge-primary">Total: {{ $appointments->total() }}</span> --}}
            </div>
        </div>
    </x-slot>

    <x-slot name="body">
        <!-- Filter Form -->
        <div class="mb-4">
            <form method="GET" action="{{ route('admin.appointment.search') }}" class="form-inline">
                <label class="mr-2" for="status-filter">Filter by Status:</label>
                <select name="status" id="status-filter" class="form-control mr-2" onchange="this.form.submit()">
                    <option value="all" {{ request('status') === 'all' || request('status') === null ? 'selected' : '' }}>All Statuses</option>
                    <option value="connected" {{ request('status') === 'connected' ? 'selected' : '' }}>Connected</option>
                    <option value="not connected" {{ request('status') === 'not connected' ? 'selected' : '' }}>Not Connected</option>
                </select>
                @if(request('status') && request('status') !== 'all')
                    <a href="{{ route('admin.appointment.search') }}" class="btn btn-secondary btn-sm">Clear Filter</a>
                @endif
            </form>
        </div>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if($appointments->isEmpty())
            <p>No appointments found.</p>
        @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Date & Time</th>
                        <th>#</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        {{-- <th>Service Type</th> --}}
                        <th>Note</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $index => $appointment)
                        <tr>
                            <td>
                                {{ \Carbon\Carbon::parse($appointment->date)->format('d M Y') }}<br>
                                {{ \Carbon\Carbon::parse($appointment->time)->format('h:i A') }}
                            </td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->phone }}</td>
                            <td>{{ $appointment->car_model }}</td>
                            {{-- <td>{{ $appointment->service_type }}</td> --}}
                            <td>{{ $appointment->note ?? '-' }}</td>
                            <td>
                                <span class="badge badge-{{ $appointment->status === 'connected' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($appointment->status ?? 'not connected') }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('admin.appointment.updateStatus', $appointment->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <input type="hidden" name="status" value="connected">
                                    <button type="submit" class="btn btn-sm btn-success" {{ $appointment->status === 'connected' ? 'disabled' : '' }}>
                                        Connected
                                    </button>
                                </form>
                                <form action="{{ route('admin.appointment.updateStatus', $appointment->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <input type="hidden" name="status" value="not connected">
                                    <button type="submit" class="btn btn-sm btn-secondary" {{ $appointment->status === 'not connected' ? 'disabled' : '' }}>
                                        Not Connected
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $appointments->links() }}
        </div>
        @endif
    </x-slot>
</x-backend.card>

<style>
.appointment-stats .badge {
    font-size: 14px;
    padding: 8px 12px;
}
</style>
@endsection
