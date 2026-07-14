@extends('frontend.layouts.app')

@section('content')
<div class="main-content">
    <!-- ✅ Banner Section -->
    <div class="banner-area pb-100">
        <div class="container-fluid">
            <div class="hero-slider owl-carousel owl-theme" data-slider-id="1">
                <div class="slider-item" style="background-image: url('{{ asset('/setting/about/' . $about->banner_img) }}'); background-size:cover; background-position:center; height:400px; display:flex; align-items:center; justify-content:center;">
                    <div class="slider-content" style="text-align:center; color:#fff;">
                        <h2 style="font-size:50px; font-weight:700; background:rgba(0,0,0,0.5); padding:10px 20px; border-radius:10px;">Book Your Appointment</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Appointment Form Section -->
    <div class="rs-about gray-color mt-10 pt-80 pb-100 md-pt-50 md-pb-50">
        <div class="container">
            <div class="appointment-container">
                <h2>Book Your Appointment</h2>

                <!-- ✅ Success Message -->
                @if(session('success'))
                <div style="max-width: 600px; margin: 30px auto; padding: 15px 20px; background-color: #d4edda; color: #155724; border-radius: 8px; border: 1px solid #c3e6cb; font-weight: 600; text-align: center;">
                    {{ session('success') }}
                </div>
                @endif

                <!-- ✅ Appointment Form -->
                <form action="{{ route('appointment.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>

                    <div class="form-group">
                        <label for="car_model">Address</label>
                        <input type="text" id="car_model" name="car_model" placeholder="Enter your car model" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group half-width">
                            <label for="date">Preferred Date</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div class="form-group half-width">
                            <label for="time">Preferred Time</label>
                            <input type="time" id="time" name="time" required>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="service_type">Service Type</label>
                        <select id="service_type" name="service_type" required>
                            <option value="">Select a service</option>
                            <option value="Basic Wash">Basic Wash</option>
                            <option value="Full Wash">Full Wash</option>
                            <option value="Interior Cleaning">Interior Cleaning</option>
                            <option value="Exterior Polishing">Exterior Polishing</option>
                        </select>
                    </div> --}}

                    <div class="form-group">
                        <label for="note">Additional Notes</label>
                        <textarea id="note" name="note" rows="3" placeholder="Any special requests..."></textarea>
                    </div>

                    <button type="submit">Book Appointment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Styles -->
<style>
.banner-area .slider-item {
    background-size: cover;
    background-position: center;
    height: 400px;
}

.appointment-container {
    max-width: 600px;
    margin: 50px auto;
    background: #f9f9f9;
    border-radius: 15px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.1);
    padding: 40px 35px;
    font-family: 'Arial', sans-serif;
    transition: 0.3s;
}

.appointment-container:hover {
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}

.appointment-container h2 {
    text-align: center;
    color: #1565c0;
    margin-bottom: 30px;
    font-size: 28px;
    font-weight: 700;
}

.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
}

.form-group label {
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
}

.form-group input,
.form-group select,
.form-group textarea {
    padding: 14px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #1565c0;
    box-shadow: 0 0 8px rgba(21,101,192,0.3);
}

.form-row {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.half-width {
    flex: 1;
}

button {
    width: 100%;
    padding: 16px;
    background-color: #1565c0;
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background-color: #0d3c7a;
}

@media(max-width: 600px) {
    .appointment-container {
        padding: 30px 20px;
        margin: 30px 15px;
    }
    .form-row {
        flex-direction: column;
    }
    .banner-area .slider-item {
        height: 250px;
    }
}
</style>
@endsection
