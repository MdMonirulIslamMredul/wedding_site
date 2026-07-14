@extends('backend.layouts.app')
@section('title', __('Dashboard'))

@section('content')

    <x-backend.card>
        <x-slot name="header">
            <h1>Welcome to the Dashboard</h1>
        </x-slot>

    </x-backend.card>

@endsection
