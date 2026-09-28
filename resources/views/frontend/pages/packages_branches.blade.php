@extends('frontend.layouts.app')
@section('title', 'Packages | Wedding Heritage')
@section('content')

<style>
    /* Page Header Banner */
    .page-header {
        position: relative;
        padding: 125px 0 70px;
        background: #1A1C20;
        text-align: center;
        color: #fff;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('{{ asset("assets/images/portfolio_wedding_1_1784024137860.png") }}');
        background-size: cover;
        background-position: center;
        opacity: 0.25;
        z-index: 0;
    }

    .page-title {
        position: relative;
        z-index: 1;
        font-family: 'Playfair Display', serif;
        font-size: 2.45rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: #FFFFFF;
    }

    .page-subtitle {
        position: relative;
        z-index: 1;
        color: #C5A059;
        text-transform: uppercase;
        letter-spacing: 0.2em;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .packages-branches-section {
        min-height: calc(100vh - 400px);
        padding: 80px 0 100px;
        background: #FAFAFA;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .branches-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
        text-align: center;
    }

    .branches-grid {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 40px;
        flex-wrap: wrap;
    }

    .branch-card-link {
        text-decoration: none;
        display: block;
        flex: 0 0 320px;
        max-width: 320px;
        outline: none;
    }

    .branch-card {
        height: 470px;
        border-radius: 12px;
        position: relative;
        background-size: cover;
        background-position: center;
        overflow: hidden;
        box-shadow: 0 16px 45px rgba(0, 0, 0, 0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.4s ease, border-color 0.4s ease;
        border: 2px solid transparent;
    }

    .branch-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(15, 15, 15, 0.25);
        transition: background 0.4s ease;
    }

    .branch-card-link:hover .branch-card {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.28);
        border-color: #C5A059;
    }

    .branch-card-link:hover .branch-card::before {
        background: rgba(15, 15, 15, 0.12);
    }

    /* Middle Overlay Banner */
    .branch-card-overlay {
        position: relative;
        z-index: 2;
        width: 100%;
        background: rgba(45, 43, 43, 0.82);
        backdrop-filter: blur(4px);
        padding: 30px 15px;
        text-align: center;
        transition: background 0.3s ease, padding 0.3s ease;
    }

    .branch-card-link:hover .branch-card-overlay {
        background: rgba(26, 28, 32, 0.92);
        padding: 34px 15px;
    }

    .branch-name {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 800;
        color: #FFFFFF;
        margin: 0 0 6px;
        letter-spacing: 0.03em;
        text-shadow: 0 2px 8px rgba(0,0,0,0.3);
    }

    .branch-subtext {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.05rem;
        font-weight: 600;
        color: #E2C792;
        margin: 0;
        letter-spacing: 0.08em;
        text-transform: capitalize;
    }

    .branch-badge {
        display: inline-block;
        margin-top: 10px;
        padding: 4px 14px;
        background: rgba(197, 160, 89, 0.2);
        border: 1px solid #C5A059;
        border-radius: 20px;
        font-size: 0.75rem;
        color: #FFFFFF;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-header {
            padding: 90px 0 42px;
        }

        .page-title {
            font-size: 1.55rem;
        }

        .page-subtitle {
            font-size: 0.72rem;
        }

        .packages-branches-section {
            padding: 50px 0 60px;
        }

        .branches-grid {
            gap: 25px;
        }

        .branch-card-link {
            flex: 0 0 100%;
            max-width: 320px;
        }

        .branch-card {
            height: 380px;
        }
    }
</style>

<!-- Page Header Banner -->
<div class="page-header">
    <div class="page-subtitle">Exclusive Wedding Photography</div>
    <h1 class="page-title">Packages</h1>
</div>

<div class="packages-branches-section">
    <div class="branches-container">
        
        <!-- Branches Cards (Dhaka & Chittagong) -->
        <div class="branches-grid">
            
            <!-- Dhaka Branch Card -->
            <a href="{{ route('frontend.packages.location', 'dhaka') }}" class="branch-card-link" data-aos="fade-up" data-aos-delay="100">
                <div class="branch-card" style="background-image: url('{{ asset('assets/images/portfolio_wedding_1_1784024137860.png') }}');">
                    <div class="branch-card-overlay">
                        <h2 class="branch-name">Dhaka</h2>
                        <p class="branch-subtext">Packages</p>
                        <span class="branch-badge"><i class="fa-solid fa-arrow-right mr-1"></i> View Packages</span>
                    </div>
                </div>
            </a>

            <!-- Chittagong Branch Card -->
            <a href="{{ route('frontend.packages.location', 'chittagong') }}" class="branch-card-link" data-aos="fade-up" data-aos-delay="200">
                <div class="branch-card" style="background-image: url('{{ asset('assets/images/portfolio_wedding_2_1784024148520.png') }}');">
                    <div class="branch-card-overlay">
                        <h2 class="branch-name">Chittagong</h2>
                        <p class="branch-subtext">Packages</p>
                        <span class="branch-badge"><i class="fa-solid fa-arrow-right mr-1"></i> View Packages</span>
                    </div>
                </div>
            </a>

        </div>

    </div>
</div>

@endsection
