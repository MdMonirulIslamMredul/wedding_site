<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.xpeedstudio.com/html/charitypress/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Jan 2023 07:49:13 GMT -->

<head>
    <meta charset="utf-8">
    <title>{{ app_name() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', app_name())">
    <meta name="keywords"
        content="Education Consultants, USA Study Visa, Study Visa, Study Abroad Consultants, Study Visa For USA, Study in USA, Grace Education, " />
    <link rel="canonical" href="index.html">
    @yield('meta')
    <!-- responsive tag -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset(get_setting('favicon')) }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset(get_setting('favicon')) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(get_setting('favicon')) }}">
    <link rel="manifest" href="{{ asset(get_setting('favicon')) }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Bootstrap v4.4.1 css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/meanmenu.css') }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <!-- flaticon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flaticon.css') }}">
    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/remixicon.css') }}">
    <!-- off canvas css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/odometer.min.css') }}">
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/aos.css') }}">
    <!-- Main Menu css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- spacing css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dark.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <!-- Nawar Trade design system (60-30-10 palette) -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nawar-design-system.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- This stylesheet dynamically changed from style.less -->

    <!-- Font Awesome (CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-p1Cm1XjV4QX2j8p6bX7+9b0V0Q2+1Yx3V9q5bV6sQ9Yt1nG1j6k5u1yZ4s8g7h6a9p3R2d6f1e0b3c4d5e6f7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @php
    $phone = get_setting('office_phone');
    @endphp

    <meta name="google-site-verification" content="W0apjtnnwb19hnHEXcsi6wq3R6GgJpFbAGQjakbqKBc" />



    <!-- WhatsApp Floating Chat -->
    <div id="whatsapp-popup">
        <p>👋 Hi there! Need help? <br> Chat with us on WhatsApp.</p>
    </div>

    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $phone) }}" target="_blank" id="whatsapp-chat-btn">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="Chat on WhatsApp">
    </a>

    <style>
        /* Floating Button */
        #whatsapp-chat-btn {
            position: fixed;
            bottom: 100px;
            right: 40px;
            background: #25D366;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        #whatsapp-chat-btn img {
            width: 35px;
            height: 35px;
        }

        #whatsapp-chat-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        /* Static Popup Message */
        #whatsapp-popup {
            position: fixed;
            bottom: 170px;
            right: 50px;
            background: #fff;
            color: #333;
            border-radius: 8px;
            font-size: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            z-index: 9998;
            max-width: 200px;
            border-left: 4px solid #25D366;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
        }

        #whatsapp-popup p {
            margin: 0;
            padding: 12px 15px;
        }

        #whatsapp-popup.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        @media only screen and (max-width: 767px) {
            #whatsapp-popup {
                display: none !important;
            }
            #whatsapp-chat-btn {
                bottom: 30px;
                right: 20px;
                width: 50px;
                height: 50px;
            }
            #whatsapp-chat-btn img {
                width: 30px;
                height: 30px;
            }
        }
    </style>



</head>


<body>


    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')

    <script data-cfasync="false" src="{{ asset('assets/js/email-decode.min.js') }}"></script>

    <!-- modernizr js -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- jquery latest version -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Bootstrap v4.4.1 js -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
    <!-- Menu js -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- op nav js -->
    <script src="{{ asset('assets/js/carousel-thumbs.min.js') }}"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <!-- Skill bar js -->
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/appear.min.js') }}"></script>
    <!-- counter top js -->
    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
    <!-- particles js -->
    <script src="{{ asset('assets/js/ajaxchimp.min.js') }}"></script>
    <!-- magnific popup js -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var popup = document.getElementById('whatsapp-popup');
            var btn = document.getElementById('whatsapp-chat-btn');
            if (!popup || !btn) return;

            var isHovered = false;
            var autoHideTimeout;

            // Auto show after 2 seconds on page load
            var autoShowTimeout = setTimeout(function() {
                if (!isHovered) {
                    popup.classList.add('show');
                    autoHideTimeout = setTimeout(function() {
                        if (!isHovered) {
                            popup.classList.remove('show');
                        }
                    }, 5000); // Display for 5 seconds
                }
            }, 2000);

            // Hover interactions
            btn.addEventListener('mouseenter', function() {
                isHovered = true;
                clearTimeout(autoShowTimeout);
                clearTimeout(autoHideTimeout);
                popup.classList.add('show');
            });

            btn.addEventListener('mouseleave', function() {
                isHovered = false;
                popup.classList.remove('show');
            });

            // Fallback native click handler for Scroll to Top button
            document.addEventListener('click', function(e) {
                if (e.target.closest('.go-top')) {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });
        });
    </script>
</body>


<!-- Mirrored from demo.xpeedstudio.com/html/charitypress/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 05 Jan 2023 07:49:19 GMT -->

</html>