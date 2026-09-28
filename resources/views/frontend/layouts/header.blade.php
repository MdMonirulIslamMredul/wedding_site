<style>
    /* ============================================================
       NAVBAR – Premium Wedding Design
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
        transition: background 0.4s ease, box-shadow 0.4s ease;
        font-family: 'Montserrat', sans-serif;
    }

    .navbar-area.scrolled {
        position: fixed;
        background: #ffffff !important;
        backdrop-filter: none;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
    }

    /* Scrolled state: dark nav links */
    .navbar-area.scrolled .nt-nav-link {
        color: #1a1c20 !important;
    }

    .navbar-area.scrolled .nt-nav-link:hover,
    .navbar-area.scrolled .nt-nav-link:focus {
        color: #C5A059 !important;
        /* Premium Gold */
    }

    .navbar-area.scrolled .nt-nav-item.active .nt-nav-link {
        color: #C5A059 !important;
    }

    /* Scrolled: hamburger lines dark */
    .navbar-area.scrolled .nt-hamburger .line {
        background: #1a1c20;
    }

    .navbar-area.scrolled .nt-hamburger {
        background: rgba(20, 24, 32, 0.04);
    }

    /* ── Desktop nav container ── */
    .nt-nav-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        height: 80px;
        padding: 0 3rem;
    }

    /* ── Logo ── */
    .nt-logo {
        display: flex;
        align-items: center;
        flex-shrink: 0;
        text-decoration: none;
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: #fff;
        font-weight: 700;
        letter-spacing: 0.05em;
    }

    .navbar-area.scrolled .nt-logo {
        color: #1a1c20;
    }

    .nt-logo img {
        max-height: 50px;
        width: auto;
        display: block;
    }

    /* ── Nav links ── */
    .nt-nav-links {
        display: flex;
        align-items: center;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 1.5rem;
    }

    .nt-nav-links .nt-nav-item {
        position: relative;
    }

    .nt-nav-links .nt-nav-link {
        display: inline-block;
        color: #ffffff !important;
        font-size: 0.85rem;
        font-weight: 500;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        text-decoration: none;
        padding: 0.55rem 0.5rem;
        transition: color 0.3s ease;
        white-space: nowrap;
        position: relative;
    }

    .nt-nav-links .nt-nav-link::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        background: #C5A059;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        transition: width 0.3s ease;
    }

    .nt-nav-links .nt-nav-link:hover::after,
    .nt-nav-links .nt-nav-item.active .nt-nav-link::after {
        width: 100%;
    }

    .nt-nav-links .nt-nav-link:hover,
    .nt-nav-links .nt-nav-link:focus {
        color: #C5A059 !important;
    }

    .nt-nav-links .nt-nav-item.active .nt-nav-link {
        color: #C5A059 !important;
    }

    /* ── Phone CTA button ── */
    .nt-phone-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #C5A059;
        color: #ffffff !important;
        font-size: 0.85rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        text-decoration: none;
        padding: 0.75rem 1.8rem;
        border-radius: 2px;
        white-space: nowrap;
        flex-shrink: 0;
        transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.2s ease;
        box-shadow: 0 4px 15px rgba(197, 160, 89, 0.2);
    }

    .nt-phone-btn:hover,
    .nt-phone-btn:focus {
        background: #B38F48;
        box-shadow: 0 6px 20px rgba(197, 160, 89, 0.4);
        transform: translateY(-2px);
        color: #ffffff !important;
        text-decoration: none;
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
        border-top: 3px solid #C5A059;
        border-radius: 4px;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.1);
        min-width: 200px;
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
        border-radius: 2px;
        color: #1a1c20 !important;
        font-size: 0.8rem;
        font-weight: 500;
        text-decoration: none;
        border-left: 3px solid transparent;
        transition: all 0.18s ease;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .nt-dropdown li a:hover,
    .nt-dropdown li a:focus {
        background: rgba(197, 160, 89, 0.08);
        border-left-color: #C5A059;
        color: #1a1c20 !important;
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
            background: rgba(26, 28, 32, 0.98) !important;
            backdrop-filter: blur(15px);
            z-index: 999;
        }

        .navbar-area.scrolled {
            background: rgba(26, 28, 32, 0.99) !important;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.40);
        }

        .navbar-area.scrolled .nt-nav-link {
            color: #ffffff !important;
        }

        .navbar-area.scrolled .nt-logo {
            color: #ffffff !important;
        }

        .navbar-area.scrolled .nt-hamburger .line {
            background: #ffffff;
        }

        .nt-nav-inner {
            padding: 0 1.5rem;
            height: 70px;
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
    }

    /* Hamburger */
    .nt-hamburger {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 6px;
        width: 45px;
        height: 45px;
        border: none;
        border-radius: 4px;
        background: transparent;
        cursor: pointer;
        padding: 0;
        transition: background 0.3s ease;
        flex-shrink: 0;
    }

    .nt-hamburger .line {
        display: block;
        width: 26px;
        height: 2px;
        background: #ffffff;
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .nt-hamburger:not(.collapsed) .line1 {
        transform: translateY(8px) rotate(45deg);
    }

    .nt-hamburger:not(.collapsed) .line2 {
        opacity: 0;
    }

    .nt-hamburger:not(.collapsed) .line3 {
        transform: translateY(-8px) rotate(-45deg);
    }

    /* Mobile menu panel */
    .nt-mobile-panel {
        background: rgba(26, 28, 32, 0.98);
    }

    .nt-mobile-list {
        list-style: none;
        margin: 0;
        padding: 1.5rem;
        max-height: calc(100vh - 70px);
        overflow-y: auto;
    }

    .nt-mobile-list>li {
        margin-bottom: 0.5rem;
    }

    .nt-mobile-link {
        display: block;
        padding: 1rem;
        color: #ffffff !important;
        font-size: 0.95rem;
        font-weight: 500;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .nt-mobile-link:hover,
    .nt-mobile-link:focus,
    .nt-mobile-link.active {
        color: #C5A059 !important;
        padding-left: 1.5rem;
    }

    .nt-mobile-phone {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1.5rem;
        padding: 1rem;
        background: #C5A059;
        color: #ffffff !important;
        font-size: 0.95rem;
        font-weight: 600;
        text-decoration: none;
        justify-content: center;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        border-radius: 2px;
    }
</style>

<div class="navbar-area">
    <div class="container-fluid">
        <div class="nt-nav-inner">

            {{-- Logo --}}
            <a class="nt-logo" href="/">
                <img src="{{ asset(get_setting('frontend_logo_menu')) }}" alt="Wedding House" class="img-fluid" style="height: 40px; width: auto;">
            </a>

            {{-- Nav links (centre / right) --}}
            <ul class="nt-nav-links nt-desktop-nav-links">
                <li class="nt-nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="/">Home</a>
                </li>
                <li class="nt-nav-item has-dropdown {{ request()->is('portfolio*') || request()->is('cinematography*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="#">Gallery <i class="fa-solid fa-chevron-down" style="font-size:0.7rem; margin-left:3px;"></i></a>
                    <ul class="nt-dropdown">
                        <li><a href="{{ route('album.index') }}">Albums</a></li>
                        <li><a href="{{ route('gallery.index') }}">Photo Gallery</a></li>
                        <li><a href="{{ route('frontend.cinematography') }}">Video Gallery</a></li>
                    </ul>
                </li>
                <li class="nt-nav-item {{ request()->is('service*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="/service">Our Services</a>
                </li>
                <li class="nt-nav-item {{ request()->is('packages*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="{{ route('frontend.packages') }}">Packages</a>
                </li>
                <li class="nt-nav-item {{ request()->is('book_us*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="{{ route('frontend.book_us') }}">Book Us</a>
                </li>

                <li class="nt-nav-item {{ request()->is('blogs*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="{{ route('frontend.blogs') }}">Blog</a>
                </li>
                <li class="nt-nav-item {{ request()->is('faq*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="{{ route('frontend.faq') }}">FAQ</a>
                </li>
                <li class="nt-nav-item {{ request()->is('about*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="{{ route('about.index') }}">About Us</a>
                </li>
                <li class="nt-nav-item {{ request()->is('contact*') ? 'active' : '' }}">
                    <a class="nt-nav-link" href="/contact">Contact</a>
                </li>
            </ul>

            {{-- Phone CTA --}}
            <div class="nt-phone-btn-wrap">
                <a class="nt-phone-btn" href="{{ route('frontend.book_us') }}">
                    Book Now
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
                    <a class="nt-mobile-link {{ request()->is('albums*') ? 'active' : '' }}" href="{{ route('album.index') }}">Albums</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('gallery*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Photo Gallery</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('cinematography*') ? 'active' : '' }}" href="{{ route('frontend.cinematography') }}">Video Gallery</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('service*') ? 'active' : '' }}" href="/service">Our Services</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('packages*') ? 'active' : '' }}" href="{{ route('frontend.packages') }}">Packages</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('blogs*') ? 'active' : '' }}" href="{{ route('frontend.blogs') }}">Blog</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('faq*') ? 'active' : '' }}" href="{{ route('frontend.faq') }}">FAQ</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('about*') ? 'active' : '' }}" href="{{ route('about.index') }}">About Us</a>
                </li>
                <li>
                    <a class="nt-mobile-link {{ request()->is('contact*') ? 'active' : '' }}" href="/contact">Contact</a>
                </li>
                <li>
                    <a class="nt-mobile-phone" href="#">
                        Book Now
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