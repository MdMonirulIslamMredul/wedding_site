@extends('frontend.layouts.app')
@section('title', (isset($loc) ? ucfirst($loc) . ' Packages | ' : '') . 'Wedding Heritage')
@section('content')

@php
    $currentLocation = $loc ?? 'dhaka';
    $seriesList = $packages->pluck('package_series')->unique()->filter()->values()->toArray();
    if (empty($seriesList)) {
        $seriesList = [
            'Premium Series',
            'Signature Series',
            'Standard Series'
        ];
    }
@endphp

<style>
    .filter-hidden {
        display: none !important;
    }
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
        background-image: url('{{ asset("assets/images/hero_wedding_banner_2_1784029464902.png") }}');
        background-size: cover;
        background-position: center;
        opacity: 0.22;
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

    /* Main Packages Section */
    .packages-main-section {
        padding: 30px 0 45px;
        background: #FFFFFF;
        min-height: 100vh;
        width: 100%;
    }

    /* Refined Segmented Location Switcher */
    .section-location-header {
        margin-bottom: 25px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Modern Segmented Control Bar */
    .branch-segmented-control {
        display: flex;
        background: #F2F2F2;
        padding: 3.5px;
        border-radius: 30px;
        gap: 3px;
        width: 100%;
        max-width: 385px;
        border: 1px solid #E4E4E4;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.04);
    }

    .branch-segment-btn {
        flex: 1 1 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        text-decoration: none;
        color: #666666;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.76rem;
        font-weight: 600;
        padding: 7px 12px;
        border-radius: 25px;
        transition: all 0.25s cubic-bezier(0.165, 0.84, 0.44, 1);
        white-space: nowrap;
        text-align: center;
    }

    .branch-segment-btn i {
        font-size: 0.72rem;
    }

    .branch-segment-btn:hover {
        color: #1A1C20;
        background: rgba(255, 255, 255, 0.6);
    }

    .branch-segment-btn.active {
        background: #1A1C20;
        color: #FFFFFF;
        font-weight: 700;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.16);
    }

    .branch-segment-btn.active i {
        color: #C5A059;
    }

    /* Layout: Left Sidebar + Right Grid */
    .packages-layout {
        display: flex;
        gap: 35px;
        align-items: flex-start;
        width: 100%;
        min-width: 0;
        position: relative;
    }

    /* Left Sidebar Series */
    .series-sidebar {
        flex: 0 0 240px;
        border-right: 1.5px solid #C5A059;
        padding-right: 25px;
        position: -webkit-sticky;
        position: sticky;
        top: 95px;
        min-width: 0;
        max-width: 100%;
        align-self: flex-start;
        z-index: 20;
    }

    .sidebar-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.15rem;
        font-weight: 700;
        color: #1A1C20;
        margin-bottom: 18px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .series-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 8px;
        width: 100%;
    }

    .series-item-btn {
        background: transparent;
        border: none;
        text-align: left;
        padding: 10px 14px;
        color: #555;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.92rem;
        font-weight: 500;
        cursor: pointer;
        border-radius: 6px;
        transition: all 0.25s ease;
        width: 100%;
        display: block;
    }

    .series-item-btn:hover {
        color: #1A1C20;
        background: #F5F1E8;
        padding-left: 18px;
    }

    .series-item-btn.active {
        color: #1A1C20;
        font-weight: 700;
        background: #EFE8D8;
        border-left: 3px solid #C5A059;
    }

    /* Right Main Content */
    .packages-content-area {
        flex: 1;
        min-width: 0;
        max-width: 100%;
        width: 100%;
    }

    /* Type Filter Tabs (Horizontal) */
    .type-filters-bar {
        display: flex;
        align-items: center;
        gap: 25px;
        border-bottom: 1px solid #EAEAEA;
        padding-bottom: 12px;
        margin-bottom: 35px;
        overflow-x: auto;
        width: 100%;
        max-width: 100%;
    }

    .type-filter-btn {
        background: transparent;
        border: none;
        color: #777;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.88rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 6px 4px 14px;
        cursor: pointer;
        position: relative;
        white-space: nowrap;
        transition: color 0.25s ease;
        flex-shrink: 0;
    }

    .type-filter-btn:hover {
        color: #1A1C20;
    }

    .type-filter-btn.active {
        color: #1A1C20;
        font-weight: 700;
    }

    .type-filter-btn.active::after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        right: 0;
        height: 2.5px;
        background: #C5A059;
    }

    /* Packages 3-Column Grid */
    .packages-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(285px, 1fr));
        gap: 25px;
        width: 100%;
        min-width: 0;
    }

    /* Package Card Styling */
    .package-card-bh {
        background: #FFFFFF;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0,0,0,0.06);
        border: 1px solid #EBEBEB;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        width: 100%;
        min-width: 0;
        box-sizing: border-box;
    }

    .package-card-bh:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        border-color: #C5A059;
    }

    /* Card Header with Image & Overlay */
    .card-header-image {
        height: 180px;
        position: relative;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .card-header-image::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(20, 20, 20, 0.4);
        transition: background 0.3s ease;
    }

    .package-card-bh:hover .card-header-image::before {
        background: rgba(20, 20, 20, 0.25);
    }

    .card-header-overlay {
        position: relative;
        z-index: 1;
        width: 100%;
        background: rgba(36, 34, 34, 0.82);
        padding: 16px 12px;
        text-align: center;
        color: #fff;
    }

    .card-series-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.22rem;
        font-weight: 700;
        margin: 0 0 4px;
        color: #FFFFFF;
        letter-spacing: 0.02em;
    }

    .card-package-code {
        font-family: 'Montserrat', sans-serif;
        font-size: 0.8rem;
        color: #E2C792;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-weight: 600;
    }

    /* Card Body */
    .card-body-bh {
        padding: 22px 20px 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .card-features-summary {
        list-style: none;
        padding: 0;
        margin: 0 0 16px;
        color: #4A4A4A;
        font-size: 0.88rem;
        line-height: 1.5;
        min-height: 52px;
        text-align: center;
    }

    .card-features-summary li {
        margin-bottom: 4px;
    }

    .card-divider {
        height: 1px;
        background: #EEEEEE;
        margin-bottom: 16px;
    }

    /* Card Footer (Price & Details Button) */
    .card-footer-bh {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-price-tag {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.15rem;
        font-weight: 700;
        color: #1A1C20;
    }

    .card-price-tag span {
        font-size: 0.75rem;
        color: #777;
        font-weight: 500;
    }

    .btn-details-bh {
        background: #242222;
        color: #FFFFFF;
        border: none;
        padding: 7px 18px;
        font-size: 0.84rem;
        font-family: 'Montserrat', sans-serif;
        font-weight: 600;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .btn-details-bh:hover {
        background: #C5A059;
        color: #1A1C20;
    }

    /* Custom Package Card */
    .custom-package-card {
        background: #1A1C20;
        border: 2px dashed #C5A059;
        color: #fff;
    }

    .custom-package-card .card-header-overlay {
        background: rgba(197, 160, 89, 0.15);
    }

    .custom-package-card .card-features-summary {
        color: #CCC;
    }

    .custom-package-card .card-price-tag {
        color: #C5A059;
        font-size: 1.05rem;
    }

    .custom-package-card .btn-details-bh {
        background: #C5A059;
        color: #1A1C20;
        font-weight: 700;
    }

    /* Details Modal Overlay */
    .bh-modal-backdrop {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.65);
        backdrop-filter: blur(4px);
        z-index: 9999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .bh-modal-backdrop.show {
        display: flex;
        opacity: 1;
    }

    .bh-modal-box {
        background: #FFFFFF;
        border-radius: 10px;
        max-width: 620px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        position: relative;
        transform: translateY(20px);
        transition: transform 0.3s ease;
        border-top: 5px solid #C5A059;
    }

    .bh-modal-backdrop.show .bh-modal-box {
        transform: translateY(0);
    }

    .bh-modal-close-btn {
        position: absolute;
        top: 14px;
        right: 18px;
        background: transparent;
        border: none;
        font-size: 1.5rem;
        color: #777;
        cursor: pointer;
        transition: color 0.2s ease;
        line-height: 1;
    }

    .bh-modal-close-btn:hover {
        color: #111;
    }

    .bh-modal-header {
        padding: 25px 30px 15px;
        text-align: center;
        border-bottom: 1px solid #F0F0F0;
    }

    .bh-modal-series-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        font-weight: 700;
        color: #1A1C20;
        margin: 0 0 5px;
    }

    .bh-modal-package-name {
        font-family: 'Montserrat', sans-serif;
        font-size: 0.95rem;
        color: #C5A059;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin: 0;
    }

    .bh-modal-body {
        padding: 24px 30px;
    }

    .bh-modal-summary {
        text-align: center;
        font-weight: 600;
        color: #333;
        font-size: 0.95rem;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px dashed #E5E5E5;
    }

    .bh-modal-features-list {
        list-style: none;
        padding: 0;
        margin: 0 0 25px;
    }

    .bh-modal-features-list li {
        padding: 7px 0;
        font-size: 0.92rem;
        color: #444;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        line-height: 1.45;
        border-bottom: 1px solid #FAFAFA;
    }

    .bh-modal-features-list li i {
        color: #C5A059;
        margin-top: 4px;
        font-size: 0.85rem;
    }

    .bh-modal-surcharge-notice {
        background: #FDF8F0;
        border-left: 3px solid #C5A059;
        padding: 12px 16px;
        border-radius: 4px;
        margin-bottom: 20px;
        font-size: 0.85rem;
        color: #665233;
        line-height: 1.4;
    }

    .bh-modal-surcharge-notice strong {
        color: #1A1C20;
    }

    .bh-modal-footer {
        padding: 16px 30px 25px;
        border-top: 1px solid #F0F0F0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .bh-modal-price {
        font-family: 'Montserrat', sans-serif;
        font-size: 1.6rem;
        font-weight: 800;
        color: #C5A059;
    }

    .bh-modal-price span {
        font-size: 0.9rem;
        color: #888;
        font-weight: 500;
    }

    .bh-modal-actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .btn-modal-copy {
        background: transparent;
        border: 1px solid #CCC;
        color: #444;
        padding: 9px 16px;
        font-size: 0.85rem;
        font-weight: 600;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.25s ease;
    }

    .btn-modal-copy:hover {
        background: #F5F5F5;
        border-color: #999;
        color: #111;
    }

    .btn-modal-book {
        background: #1A1C20;
        color: #FFFFFF;
        border: none;
        padding: 10px 22px;
        font-size: 0.88rem;
        font-family: 'Montserrat', sans-serif;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.25s ease;
    }

    .btn-modal-book:hover {
        background: #C5A059;
        color: #1A1C20;
    }

    /* Toast Notification for Copy */
    .copy-toast {
        position: fixed;
        bottom: 30px;
        right: 30px;
        background: #1A1C20;
        color: #C5A059;
        padding: 12px 24px;
        border-radius: 6px;
        font-size: 0.9rem;
        font-weight: 600;
        box-shadow: 0 8px 24px rgba(0,0,0,0.25);
        z-index: 10000;
        display: none;
        border-left: 4px solid #C5A059;
    }

    /* Empty State */
    .packages-empty-state {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        color: #777;
        background: #FAFAFA;
        border-radius: 8px;
        border: 1px dashed #DDD;
    }

    /* Mobile Responsiveness */
    @media (max-width: 991px) {
        .packages-main-section {
            padding: 25px 0 35px;
            overflow-x: hidden;
        }

        .packages-layout {
            flex-direction: column;
            gap: 20px;
            width: 100%;
            min-width: 0;
        }

        .series-sidebar {
            flex: none;
            width: 100%;
            max-width: 100%;
            min-width: 0;
            border-right: none;
            border-bottom: 1px solid #EAEAEA;
            padding-right: 0;
            padding-bottom: 14px;
            position: static;
        }

        .sidebar-title {
            font-size: 0.9rem;
            margin-bottom: 10px;
            color: #1A1C20;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .series-list {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            overflow-x: auto;
            gap: 8px;
            padding: 4px 2px 8px;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            width: 100%;
            max-width: 100%;
        }

        .series-list::-webkit-scrollbar {
            display: none;
        }

        .series-list li {
            flex: 0 0 auto;
        }

        .series-item-btn {
            white-space: nowrap;
            padding: 8px 18px;
            border-radius: 25px;
            background: #F8F8F8;
            border: 1px solid #E5E5E5;
            font-size: 0.84rem;
            font-weight: 600;
            color: #555;
            display: inline-block;
            width: auto;
            transition: all 0.25s ease;
        }

        .series-item-btn:hover {
            background: #F0EAE0;
            color: #1A1C20;
            padding-left: 18px;
        }

        .series-item-btn.active {
            background: #1A1C20;
            border-color: #1A1C20;
            color: #FFFFFF;
            font-weight: 700;
            border-left: 1px solid #1A1C20;
            border-bottom: 1px solid #1A1C20;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        .packages-content-area {
            width: 100%;
            max-width: 100%;
            min-width: 0;
        }

        .type-filters-bar {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            gap: 18px;
            margin-bottom: 25px;
            padding-bottom: 8px;
            border-bottom: 1px solid #EAEAEA;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            width: 100%;
            max-width: 100%;
        }

        .type-filters-bar::-webkit-scrollbar {
            display: none;
        }

        .type-filter-btn {
            flex: 0 0 auto;
            font-size: 0.82rem;
            padding: 6px 2px 10px;
            white-space: nowrap;
        }

        .packages-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            width: 100%;
            min-width: 0;
        }
    }

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

        .section-location-header {
            margin-bottom: 16px;
        }

        .branch-segmented-control {
            max-width: 100%;
            padding: 3px;
            gap: 3px;
            width: 100%;
        }

        .branch-segment-btn {
            font-size: 0.72rem;
            padding: 6.5px 6px;
            gap: 4px;
        }

        .branch-segment-btn i {
            font-size: 0.65rem;
        }
    }

    @media (max-width: 576px) {
        .packages-main-section {
            padding: 15px 0 25px;
        }

        .packages-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            max-width: 100%;
        }

        .package-card-bh {
            width: 100%;
            max-width: 100%;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #E8E8E8;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-header-image {
            height: 160px;
            width: 100%;
        }

        .card-header-overlay {
            padding: 14px 12px;
        }

        .card-series-title {
            font-size: 1.15rem;
        }

        .card-package-code {
            font-size: 0.75rem;
        }

        .card-body-bh {
            padding: 18px 16px 16px;
            width: 100%;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-grow: 1;
        }

        .card-features-summary {
            font-size: 0.88rem;
            min-height: auto;
            margin-bottom: 14px;
            text-align: center;
            color: #4A4A4A;
            line-height: 1.6;
        }

        .card-divider {
            margin-bottom: 14px;
            height: 1px;
            background: #EEEEEE;
        }

        .card-footer-bh {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            gap: 10px;
        }

        .card-price-tag {
            font-size: 1.15rem;
            font-weight: 800;
            color: #1A1C20;
        }

        .btn-details-bh {
            padding: 8px 20px;
            font-size: 0.84rem;
            font-weight: 700;
            border-radius: 4px;
            background: #1A1C20;
            color: #FFFFFF;
            flex-shrink: 0;
            display: inline-block;
        }

        /* Bottom-Sheet Style Modal for Mobile */
        .bh-modal-backdrop {
            padding: 0;
            align-items: flex-end;
        }

        .bh-modal-box {
            max-height: 88vh;
            border-radius: 20px 20px 0 0;
            border-top: 4px solid #C5A059;
            transform: translateY(100%);
            width: 100%;
            max-width: 100%;
        }

        .bh-modal-backdrop.show .bh-modal-box {
            transform: translateY(0);
        }

        .bh-modal-close-btn {
            top: 12px;
            right: 14px;
            font-size: 1.8rem;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bh-modal-header {
            padding: 20px 20px 12px;
        }

        .bh-modal-series-title {
            font-size: 1.4rem;
        }

        .bh-modal-package-name {
            font-size: 0.82rem;
        }

        .bh-modal-body {
            padding: 15px 18px;
        }

        .bh-modal-summary {
            font-size: 0.88rem;
            margin-bottom: 14px;
            padding-bottom: 10px;
        }

        .bh-modal-features-list {
            margin-bottom: 16px;
        }

        .bh-modal-features-list li {
            font-size: 0.86rem;
            padding: 6px 0;
        }

        .bh-modal-surcharge-notice {
            font-size: 0.78rem;
            padding: 10px 12px;
            margin-bottom: 14px;
        }

        .bh-modal-footer {
            padding: 15px 18px 20px;
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
            background: #FAFAFA;
        }

        .bh-modal-price {
            text-align: center;
            font-size: 1.4rem;
        }

        .bh-modal-actions {
            flex-direction: column;
            width: 100%;
            gap: 10px;
        }

        .btn-modal-book,
        .btn-modal-copy {
            width: 100%;
            text-align: center;
            justify-content: center;
            padding: 12px;
            font-size: 0.88rem;
            border-radius: 4px;
        }

        .copy-toast {
            left: 20px;
            right: 20px;
            bottom: 20px;
            text-align: center;
            font-size: 0.85rem;
            padding: 10px 16px;
        }
    }
</style>

<!-- Page Header Banner -->
<div class="page-header">
    <div class="page-subtitle">Wedding Heritage</div>
    <h1 class="page-title">{{ $currentLocation === 'all' ? 'All Packages' : ucfirst($currentLocation) . ' Packages' }}</h1>
</div>

<!-- Main Packages Section -->
<div class="packages-main-section">
    <div class="container">

        <!-- Top Branch Header Navigation -->
        <div class="section-location-header" data-aos="fade-up">
            <!-- Segmented Pill Control -->
            <div class="branch-segmented-control">
                <a href="{{ route('frontend.packages.location', 'dhaka') }}" class="branch-segment-btn {{ $currentLocation === 'dhaka' ? 'active' : '' }}">
                    <i class="fa-solid fa-location-dot"></i> Dhaka
                </a>
                <a href="{{ route('frontend.packages.location', 'chittagong') }}" class="branch-segment-btn {{ $currentLocation === 'chittagong' ? 'active' : '' }}">
                    <i class="fa-solid fa-location-dot"></i> Chittagong
                </a>
                <a href="{{ route('frontend.packages.location', 'all') }}" class="branch-segment-btn {{ $currentLocation === 'all' ? 'active' : '' }}">
                    <i class="fa-solid fa-globe"></i> All Locations
                </a>
            </div>
        </div>

        <div class="packages-layout">
            
            <!-- Left Sidebar Series -->
            <aside class="series-sidebar">
                <div class="sidebar-title">Package Series</div>
                <ul class="series-list">
                    <li>
                        <button class="series-item-btn active" onclick="filterBySeries('all', this)">
                            ALL Packages
                        </button>
                    </li>
                    @foreach($seriesList as $series)
                        <li>
                            <button class="series-item-btn" onclick="filterBySeries('{{ addslashes($series) }}', this)">
                                {{ $series }}
                            </button>
                        </li>
                    @endforeach
                    {{-- <li>
                        <button class="series-item-btn" onclick="filterBySeries('Custom Package', this)">
                            Custom Package
                        </button>
                    </li> --}}
                </ul>
            </aside>

            <!-- Right Content Area -->
            <main class="packages-content-area">
                
                <!-- Type Filter Tabs (Horizontal) -->
                <div class="type-filters-bar" data-aos="fade-left">
                    <button class="type-filter-btn active" onclick="filterByType('all', this)">ALL Type</button>
                    <button class="type-filter-btn" onclick="filterByType('COMBO (PHOTO+CINE)', this)">COMBO (PHOTO+CINE)</button>
                    <button class="type-filter-btn" onclick="filterByType('PHOTOGRAPHY', this)">PHOTOGRAPHY</button>
                    <button class="type-filter-btn" onclick="filterByType('CINEMATOGRAPHY', this)">CINEMATOGRAPHY</button>
                </div>

                <!-- Packages Grid -->
                <div class="packages-grid" id="packages-grid-container">

                    @php
                        $coverImages = [
                            asset('assets/images/portfolio_wedding_1_1784024137860.png'),
                            asset('assets/images/portfolio_wedding_2_1784024148520.png'),
                            asset('assets/images/about_wedding_image_1784024125051.png'),
                            asset('assets/images/hero_wedding_image_1784024113691.png'),
                        ];
                    @endphp

                    @forelse($packages as $index => $package)
                        @php
                            $pkgSeries = $package->package_series ?? 'Standard Series';
                            $pkgCategory = $package->package_category ?? 'PHOTOGRAPHY';
                            $pkgLocation = $package->location ?? 'dhaka';
                            
                            // Extract lines of features
                            $rawFeatures = $package->features ?? '';
                            $featuresArray = array_filter(array_map('trim', explode("\n", str_replace(["\r", "►"], "", $rawFeatures))));
                            $previewFeatures = array_slice($featuresArray, 0, 2);

                            // Choose cover image: 1st package image, 2nd category image, 3rd fallback
                            $imgIndex = $index % count($coverImages);
                            $coverImg = $coverImages[$imgIndex];
                            if ($package->image && file_exists(public_path('setting/package/' . $package->image))) {
                                $coverImg = asset('setting/package/' . $package->image);
                            } elseif ($package->category && $package->category->image && file_exists(public_path('setting/package_category/' . $package->category->image))) {
                                $coverImg = asset('setting/package_category/' . $package->category->image);
                            }
                        @endphp

                        <div class="package-card-bh package-item" 
                             data-location="{{ strtolower($pkgLocation) }}"
                             data-series="{{ strtolower($pkgSeries) }}"
                             data-category="{{ strtolower($pkgCategory) }}"
                             data-id="{{ $package->id }}"
                             data-aos="fade-up">

                            <!-- Header Image & Overlay -->
                            <div class="card-header-image" style="background-image: url('{{ $coverImg }}');">
                                <div class="card-header-overlay">
                                    <h3 class="card-series-title">{{ $pkgSeries }}</h3>
                                    <p class="card-package-code">{{ $package->name }}</p>
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="card-body-bh">
                                <ul class="card-features-summary">
                                    @forelse($previewFeatures as $pf)
                                        <li>{{ $pf }}</li>
                                    @empty
                                        <li>Comprehensive event coverage</li>
                                        <li>High quality deliverables & editing</li>
                                    @endforelse
                                </ul>

                                <div class="card-divider"></div>

                                <div class="card-footer-bh">
                                    <div class="card-price-tag">
                                        TK. {{ $package->price }}
                                        @if($package->suffix)
                                            <span>{{ $package->suffix }}</span>
                                        @endif
                                    </div>
                                    <button type="button" class="btn-details-bh" onclick="openPackageModal({{ $package->id }})">
                                        Details
                                    </button>
                                </div>
                            </div>
                        </div>

                    @empty
                        <div class="packages-empty-state">
                            <p>No packages found for this branch at the moment.</p>
                        </div>
                    @endforelse

                    <!-- Dynamic Empty State for JS Filtering -->
                    <div id="noPackagesDynamicState" class="packages-empty-state" style="display: none; grid-column: 1 / -1; width: 100%; text-align: center; padding: 40px 20px;">
                        <i class="fa-solid fa-camera-retro" style="font-size: 2.2rem; color: #C5A059; margin-bottom: 12px; display: block;"></i>
                        <p style="margin: 0; font-size: 1rem; color: #666; font-weight: 500;">No packages found in this category.</p>
                    </div>

                    <!-- Custom Package Card -->
                    {{-- <div class="package-card-bh package-item custom-package-card"
                         data-location="all"
                         data-series="custom package"
                         data-category="custom package"
                         data-id="custom"
                         data-aos="fade-up">
                        <div>
                            <div class="card-header-image" style="background-image: url('{{ asset("assets/images/hero_wedding_banner_2_1784029464902.png") }}');">
                                <div class="card-header-overlay">
                                    <h3 class="card-series-title" style="color: #C5A059;">Custom Package</h3>
                                    <p class="card-package-code">Tailored Facilities</p>
                                </div>
                            </div>
                            <div class="card-body-bh">
                                <ul class="card-features-summary">
                                    <li>Choose Chief, Senior & Core Team</li>
                                    <li>Flexible Hours, Prints & Videography</li>
                                </ul>

                                <div class="card-divider" style="background: rgba(255,255,255,0.15);"></div>

                                <div class="card-footer-bh">
                                    <div class="card-price-tag">
                                        On Consultation
                                    </div>
                                    <a href="{{ url('/book_us') }}" class="btn-details-bh" style="text-decoration:none;">
                                        Customize
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>

            </main>
        </div>

    </div>
</div>

<!-- Package Details Modal Overlay -->
<div class="bh-modal-backdrop" id="packageDetailsModal" onclick="handleBackdropClick(event)">
    <div class="bh-modal-box">
        <button type="button" class="bh-modal-close-btn" onclick="closePackageModal()">&times;</button>
        
        <div class="bh-modal-header">
            <h3 class="bh-modal-series-title" id="modalSeriesTitle">Premium Series</h3>
            <p class="bh-modal-package-name" id="modalPackageName">Package Code</p>
        </div>

        <div class="bh-modal-body">
            <div class="bh-modal-summary" id="modalSummary">
                Deliverables & Coverage Details
            </div>

            <ul class="bh-modal-features-list" id="modalFeaturesList">
                <!-- Features populated dynamically via JS -->
            </ul>

            <div class="bh-modal-surcharge-notice">
                <strong>For outside of Dhaka & Chittagong metropolitan area</strong><br>
                Transportation + Accommodation & 15% shift charge (Package Price) will be added with package price.
            </div>
        </div>

        <div class="bh-modal-footer">
            <div class="bh-modal-price" id="modalPrice">
                19,999 <span>TK</span>
            </div>
            <div class="bh-modal-actions">
                <button type="button" class="btn-modal-copy" onclick="copyPackageLink()">
                    <i class="fa-regular fa-copy mr-1"></i> Copy Link
                </button>
                <a href="{{ url('/book_us') }}" class="btn-modal-book" id="modalBookBtn">
                    <i class="fa-solid fa-calendar-check mr-1"></i> Book Package
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Copy Link Toast Notification -->
<div class="copy-toast" id="copyToast">
    <i class="fa-solid fa-check-circle mr-2"></i> Package link copied to clipboard!
</div>

<!-- Packages Data for Modal -->
<script>
@php
    $jsPackages = [];
    foreach($packages as $pkg) {
        $rawFeats = $pkg->features ?? '';
        $feats = array_values(array_filter(array_map('trim', explode("\n", str_replace(["\r", "►"], "", $rawFeats)))));
        $jsPackages[$pkg->id] = [
            'id' => $pkg->id,
            'name' => $pkg->name,
            'series' => $pkg->package_series ?? 'Standard Series',
            'category' => $pkg->package_category ?? 'PHOTOGRAPHY',
            'location' => $pkg->location ?? 'Dhaka',
            'price' => $pkg->price,
            'suffix' => $pkg->suffix ?? '',
            'features' => $feats,
            'bookUrl' => url('/book_us?package=' . $pkg->id)
        ];
    }
@endphp

const packagesData = @json($jsPackages);

// Current Filter States
let currentFilter = {
    series: 'all',
    category: 'all'
};

let activeModalPackageId = null;

// Filter by Series / Left Sidebar
function filterBySeries(series, button) {
    currentFilter.series = (series || 'all').toString().trim().toLowerCase();
    
    document.querySelectorAll('.series-item-btn').forEach(btn => btn.classList.remove('active'));
    if (button) button.classList.add('active');

    applyAllFilters();
}

// Filter by Category / Type Tabs (Horizontal)
function filterByType(category, button) {
    currentFilter.category = (category || 'all').toString().trim().toLowerCase();
    
    document.querySelectorAll('.type-filter-btn').forEach(btn => btn.classList.remove('active'));
    if (button) button.classList.add('active');

    applyAllFilters();
}

// Apply multi-criteria filtering
function applyAllFilters() {
    const cards = document.querySelectorAll('.package-item');
    let visibleCount = 0;

    cards.forEach(card => {
        const cardSeries = (card.getAttribute('data-series') || '').toLowerCase().trim();
        const cardCategory = (card.getAttribute('data-category') || '').toLowerCase().trim();

        // Check series match
        const seriesMatch = (
            currentFilter.series === 'all' || 
            cardSeries === currentFilter.series ||
            cardSeries.includes(currentFilter.series) || 
            currentFilter.series.includes(cardSeries)
        );

        // Check category / type match
        const categoryMatch = (
            currentFilter.category === 'all' || 
            cardCategory === currentFilter.category ||
            cardCategory.includes(currentFilter.category) ||
            (currentFilter.category.includes('combo') && cardCategory.includes('combo')) ||
            (currentFilter.category.includes('photo') && !currentFilter.category.includes('combo') && cardCategory === 'photography') ||
            (currentFilter.category.includes('cine') && !currentFilter.category.includes('combo') && cardCategory === 'cinematography')
        );

        if (seriesMatch && categoryMatch) {
            card.classList.remove('filter-hidden');
            card.style.setProperty('display', 'flex', 'important');
            visibleCount++;
        } else {
            card.classList.add('filter-hidden');
            card.style.setProperty('display', 'none', 'important');
        }
    });

    // Toggle dynamic empty state
    const emptyState = document.getElementById('noPackagesDynamicState');
    if (emptyState) {
        if (visibleCount === 0) {
            emptyState.style.setProperty('display', 'block', 'important');
        } else {
            emptyState.style.setProperty('display', 'none', 'important');
        }
    }

    if (typeof AOS !== 'undefined') {
        AOS.refresh();
    }
}

// Open Details Modal
function openPackageModal(packageId) {
    const pkg = packagesData[packageId];
    if (!pkg) return;

    activeModalPackageId = packageId;

    document.getElementById('modalSeriesTitle').textContent = pkg.series;
    document.getElementById('modalPackageName').textContent = pkg.name;
    document.getElementById('modalPrice').innerHTML = pkg.price + ' <span>TK ' + (pkg.suffix || '') + '</span>';
    document.getElementById('modalBookBtn').href = pkg.bookUrl;

    // Populate features list
    const featuresList = document.getElementById('modalFeaturesList');
    featuresList.innerHTML = '';

    if (pkg.features && pkg.features.length > 0) {
        document.getElementById('modalSummary').textContent = pkg.features[0] || 'Deliverables & Coverage';
        pkg.features.forEach(feat => {
            const li = document.createElement('li');
            li.innerHTML = '<i class="fa-solid fa-check"></i> <span>' + feat + '</span>';
            featuresList.appendChild(li);
        });
    } else {
        document.getElementById('modalSummary').textContent = 'Package Deliverables';
        const li = document.createElement('li');
        li.innerHTML = '<i class="fa-solid fa-check"></i> <span>Complete wedding photography coverage</span>';
        featuresList.appendChild(li);
    }

    const modal = document.getElementById('packageDetailsModal');
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
}

// Close Modal
function closePackageModal() {
    const modal = document.getElementById('packageDetailsModal');
    modal.classList.remove('show');
    document.body.style.overflow = 'auto';
    activeModalPackageId = null;
}

function handleBackdropClick(event) {
    if (event.target.id === 'packageDetailsModal') {
        closePackageModal();
    }
}

// Copy Package Link to Clipboard
function copyPackageLink() {
    const url = window.location.origin + window.location.pathname + '?package=' + activeModalPackageId;
    navigator.clipboard.writeText(url).then(() => {
        const toast = document.getElementById('copyToast');
        toast.style.display = 'block';
        setTimeout(() => {
            toast.style.display = 'none';
        }, 2800);
    });
}

// Keyboard ESC to close modal
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closePackageModal();
    }
});

// Run initial filter on page load
document.addEventListener('DOMContentLoaded', function() {
    applyAllFilters();

    // Check if URL has ?package={id} to auto-open modal
    const urlParams = new URLSearchParams(window.location.search);
    const packageParam = urlParams.get('package');
    if (packageParam && packagesData[packageParam]) {
        openPackageModal(packageParam);
    }
});
</script>

@endsection
