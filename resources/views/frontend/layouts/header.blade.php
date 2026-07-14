<style>
    /* ============================================================
       NAVBAR – matches the reference design
       ============================================================ */
    .navbar-area {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 999;
        background: transparent !important;
        backdrop-filter: none;
        padding: 0;
        transition: background 0.35s ease, box-shadow 0.35s ease;
    }

    .navbar-area.scrolled {
        position: fixed;
        background: #ffffff !important;
        backdrop-filter: none;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.10);
    }

    /* Scrolled state: dark nav links */
    .navbar-area.scrolled .nt-nav-link {
        color: #1a1c20 !important;
    }

    .navbar-area.scrolled .nt-nav-link:hover,
    .navbar-area.scrolled .nt-nav-link:focus {
        color: #e8344e !important;
        background: rgba(232, 52, 78, 0.08);
    }

    .navbar-area.scrolled .nt-nav-item.active .nt-nav-link {
        color: #e8344e !important;
    }

    /* Scrolled: hamburger lines dark */
    .navbar-area.scrolled .nt-hamburger .line {
        background: #1a1c20;
    }

    .navbar-area.scrolled .nt-hamburger {
        background: rgba(20, 24, 32, 0.08);
    }

    /* ── Desktop nav container ── */
    .nt-nav-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        height: 66px;
        padding: 0 1.5rem;
    }

    /* ── Logo ── */
    .nt-logo {
        display: flex;
        align-items: center;
        flex-shrink: 0;
        text-decoration: none;
    }

    .nt-logo img {
        max-height: 48px;
        width: auto;
        border-radius: 12px;
        display: block;
    }

    /* ── Nav links ── */
    .nt-nav-links {
        display: flex;
        align-items: center;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 0.1rem;
    }

    .nt-nav-links .nt-nav-item {
        position: relative;
    }

    .nt-nav-links .nt-nav-link {
        display: inline-block;
        color: #ffffff !important;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.07em;
        text-transform: uppercase;
        text-decoration: none;
        padding: 0.55rem 0.85rem;
        border-radius: 4px;
        transition: color 0.2s ease, background 0.2s ease;
        white-space: nowrap;
    }

    .nt-nav-links .nt-nav-link:hover,
    .nt-nav-links .nt-nav-link:focus {
        color: #e8344e !important;
        background: rgba(232, 52, 78, 0.10);
    }

    .nt-nav-links .nt-nav-item.active .nt-nav-link {
        color: #e8344e !important;
    }

    /* ── Phone CTA button ── */
    .nt-phone-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #e8344e;
        color: #ffffff !important;
        font-size: 0.85rem;
        font-weight: 700;
        letter-spacing: 0.03em;
        text-decoration: none;
        padding: 0.55rem 1.2rem;
        border-radius: 50px;
        white-space: nowrap;
        flex-shrink: 0;
        transition: background 0.2s ease, box-shadow 0.2s ease, transform 0.15s ease;
        box-shadow: 0 4px 16px rgba(232, 52, 78, 0.35);
    }

    .nt-phone-btn:hover,
    .nt-phone-btn:focus {
        background: #c8203a;
        box-shadow: 0 6px 22px rgba(232, 52, 78, 0.5);
        transform: translateY(-1px);
        color: #ffffff !important;
        text-decoration: none;
    }

    .nt-phone-btn svg {
        width: 16px;
        height: 16px;
        flex-shrink: 0;
    }

    /* ── Dropdown ── */
    .nt-nav-item.has-dropdown {
        position: relative;
    }

    .nt-dropdown {
        position: absolute;
        top: calc(100% + 10px);
        left: 0;
        background: #ffffff;
        border-top: 3px solid #e8344e;
        border-radius: 10px;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.18);
        min-width: 220px;
        padding: 0.5rem;
        opacity: 0;
        visibility: hidden;
        transform: translateY(8px);
        transition: opacity 0.22s ease, transform 0.22s ease, visibility 0.22s ease;
        list-style: none;
        margin: 0;
        z-index: 1000;
    }

    .nt-nav-item.has-dropdown:hover .nt-dropdown,
    .nt-nav-item.has-dropdown:focus-within .nt-dropdown {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .nt-dropdown li a {
        display: block;
        padding: 0.65rem 0.9rem;
        border-radius: 7px;
        color: #1a1c20;
        font-size: 0.88rem;
        font-weight: 600;
        text-decoration: none;
        border-left: 3px solid transparent;
        transition: all 0.18s ease;
    }

    .nt-dropdown li a:hover,
    .nt-dropdown li a:focus {
        background: rgba(232, 52, 78, 0.08);
        border-left-color: #e8344e;
        color: #1a1c20;
    }

    .nt-dropdown li+li {
        border-top: 1px solid #f0f1f3;
    }

    /* ============================================================
       MOBILE NAV
       ============================================================ */
    @media only screen and (max-width: 991px) {
        .navbar-area {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: rgba(20, 24, 32, 0.97) !important;
            backdrop-filter: blur(14px);
            z-index: 999;
        }

        /* Keep dark background on mobile even when scrolled */
        .navbar-area.scrolled {
            background: rgba(20, 24, 32, 0.98) !important;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.30);
        }

        /* Keep nav links white on mobile when scrolled */
        .navbar-area.scrolled .nt-nav-link {
            color: #ffffff !important;
        }

        /* Keep hamburger lines white on mobile when scrolled */
        .navbar-area.scrolled .nt-hamburger .line {
            background: #ffffff;
        }

        .navbar-area.scrolled .nt-hamburger {
            background: rgba(255, 255, 255, 0.12);
        }

        .nt-nav-inner {
            padding: 0 1rem;
            height: 60px;
        }

        .nt-desktop-nav-links,
        .nt-phone-btn-wrap {
            display: none !important;
        }

        .nt-hamburger {
            display: inline-flex !important;
        }
    }

    @media only screen and (min-width: 992px) {
        .nt-hamburger {
            display: none !important;
        }

        .mobile-responsive-nav {
            display: none !important;
        }
    }

    /* Hamburger */
    .nt-hamburger {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
        width: 42px;
        height: 42px;
        border: none;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.12);
        cursor: pointer;
        padding: 0;
        transition: background 0.2s ease;
        flex-shrink: 0;
    }

    .nt-hamburger:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .nt-hamburger .line {
        display: block;
        width: 22px;
        height: 2px;
        border-radius: 2px;
        background: #ffffff;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .nt-hamburger:not(.collapsed) .line1 {
        transform: translateY(7px) rotate(45deg);
    }

    .nt-hamburger:not(.collapsed) .line2 {
        opacity: 0;
    }

    .nt-hamburger:not(.collapsed) .line3 {
        transform: translateY(-7px) rotate(-45deg);
    }

    /* Mobile menu panel */
    .nt-mobile-panel {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nt-mobile-list {
        list-style: none;
        margin: 0;
        padding: 0.75rem 1rem 1.2rem;
        max-height: calc(100vh - 70px);
        overflow-y: auto;
    }

    .nt-mobile-list>li {
        margin-bottom: 0.4rem;
    }

    .nt-mobile-link {
        display: block;
        padding: 0.8rem 1rem;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #ffffff !important;
        font-size: 0.9rem;
        font-weight: 700;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .nt-mobile-link:hover,
    .nt-mobile-link:focus,
    .nt-mobile-link.active {
        background: #e8344e;
        border-color: #e8344e;
        color: #ffffff !important;
    }

    .nt-mobile-phone {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.75rem;
        padding: 0.8rem 1rem;
        border-radius: 50px;
        background: #e8344e;
        color: #ffffff !important;
        font-size: 0.9rem;
        font-weight: 700;
        text-decoration: none;
        justify-content: center;
        box-shadow: 0 4px 16px rgba(232, 52, 78, 0.4);
    }

    /* Legacy classes kept for safety */
    .mobile-responsive-nav {
        display: block;
    }

    @media only screen and (min-width: 992px) {
        .mobile-responsive-nav {
            display: none !important;
        }
    }
</style>

@php
$pendingProjects = DB::table('projects')
->where('is_active', 1)->where('status', 1)->latest()->get();
$runningProjects = DB::table('projects')
->where('is_active', 1)->where('status', 2)->latest()->get();
$completeProjects = DB::table('projects')
->where('is_active', 1)->where('status', 3)->latest()->get();
$services = DB::table('services')->where('is_active', 1)->latest()->get();
@endphp

<div class="navbar-area">

    {{-- ═══════════════════════════════════════════════
         DESKTOP NAV  (≥ 992 px)
    ═══════════════════════════════════════════════ --}}
    <div class="container-fluid">
        <div class="nt-nav-inner">

            {{-- Logo --}}
            <a class="nt-logo" href="/">
                <img src="{{ asset(get_setting('frontend_logo_menu')) }}" alt="logo">
            </a>

            {{-- Nav links (centre / right) --}}
            <ul class="nt-nav-links nt-desktop-nav-links">
                <li class="nt-nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="/">Home</a>
                </li>
                <li class="nt-nav-item {{ request()->is('about*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="{{ route('about.index') }}">About Us</a>
                </li>
                <li class="nt-nav-item {{ request()->is('service*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="/service">Services</a>
                </li>
                <li class="nt-nav-item {{ request()->is('destination*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="/destination">Destination</a>
                </li>
                <li class="nt-nav-item {{ request()->is('testimonial*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="/testimonial">Testimonials</a>
                </li>
                <li class="nt-nav-item {{ request()->is('blog*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="/blogs">Blogs &amp; Events</a>
                </li>
                <li class="nt-nav-item {{ request()->is('team*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="/teams">Team</a>
                </li>
                <li class="nt-nav-item {{ request()->is('contact*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="/contact">Contact</a>
                </li>
            </ul>

            {{-- Phone CTA --}}
            <div class="nt-phone-btn-wrap">
                <a class="nt-phone-btn" href="tel:01713032966">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.47 11.47 0 003.59.57 1 1 0 011 1V20a1 1 0 01-1 1C9.61 21 3 14.39 3 6a1 1 0 011-1h3.5a1 1 0 011 1 11.47 11.47 0 00.57 3.59 1 1 0 01-.25 1.01l-2.2 2.19z" />
                    </svg>
                    01713-032966
                </a>
            </div>

            {{-- Hamburger (mobile only) --}}
            <button class="nt-hamburger collapsed" type="button"
                data-bs-toggle="collapse" data-bs-target="#ntMobileNav"
                aria-controls="ntMobileNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </button>
        </div>

        {{-- ═══════════════════════════════════════════
             MOBILE MENU PANEL
        ═══════════════════════════════════════════ --}}
        <div class="collapse nt-mobile-panel" id="ntMobileNav">
            <ul class="nt-mobile-list">
                <li>
                    <a class="nt-mobile-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('about*') ? 'active' : '' }}"
                        href="{{ route('about.index') }}">About Us</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('service*') ? 'active' : '' }}"
                        href="/service">Services</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('destination*') ? 'active' : '' }}"
                        href="/destination">Destination</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('testimonial*') ? 'active' : '' }}"
                        href="/testimonial">Testimonials</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('blog*') ? 'active' : '' }}"
                        href="/blogs">Blogs &amp; Events</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('team*') ? 'active' : '' }}"
                        href="/teams">Team</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('contact*') ? 'active' : '' }}"
                        href="/contact">Contact</a>
                </li>
                <li>
                    <a class="nt-mobile-phone" href="tel:01713032966">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.47 11.47 0 003.59.57 1 1 0 011 1V20a1 1 0 01-1 1C9.61 21 3 14.39 3 6a1 1 0 011-1h3.5a1 1 0 011 1 11.47 11.47 0 00.57 3.59 1 1 0 01-.25 1.01l-2.2 2.19z" />
                        </svg>
                        01713-032966
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>

<script>
    /* Sticky scroll effect */
    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('.navbar-area');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    /* Sync hamburger icon state with Bootstrap collapse */
    document.addEventListener('DOMContentLoaded', function() {
        var mobileNav = document.getElementById('ntMobileNav');
        var toggler = document.querySelector('.nt-hamburger');
        if (mobileNav && toggler) {
            mobileNav.addEventListener('show.bs.collapse', function() {
                toggler.classList.remove('collapsed');
            });
            mobileNav.addEventListener('hide.bs.collapse', function() {
                toggler.classList.add('collapsed');
            });
        }

        /* Collapse mobile menu when viewport grows to desktop width */
        window.addEventListener('resize', function() {
            if (window.innerWidth > 991 && window.bootstrap && mobileNav) {
                var instance = bootstrap.Collapse.getInstance(mobileNav);
                if (instance) instance.hide();
                else mobileNav.classList.remove('show');
            }
        });
    });
</script>