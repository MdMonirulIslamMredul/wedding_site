@extends('frontend.layouts.app')
@section('content')


<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    /* Gallery row */
    .row {
        display: grid !important;
        justify-content: center;
        gap: 10px;
        margin: 0 auto;
    }

    /* Gallery column with card */
    .column {
       
        max-width: calc(25% - 10px);
        padding: 10px;
    }

    .gallery-card {
        width: 100%;
        aspect-ratio: 1 / 1; /* Square frame */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background: #f8f8f8;
        display: block;
        justify-content: center;
        align-items: center;
    }

    .gallery-card img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Keep image cropped inside frame */
        cursor: pointer;
        transition: transform 0.3s;
    }

    .gallery-card img:hover {
        transform: scale(1.05);
    }

    /* Expanded image container (lightbox) */
    .containers {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: block;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        text-align: center;
    }

    #expandedImg {
        max-width: 90%;
        max-height: 90%;
        border-radius: 8px;
    }

    #imgtext {
        margin-top: 10px;
        color: white;
        font-size: 18px;
    }

    .closebtn {
        position: absolute;
        top: 20px;
        right: 25px;
        color: white;
        font-size: 40px;
        cursor: pointer;
    }

    /* ✅ Responsive adjustments */
    @media (max-width: 992px) {
        .column {
           
            max-width: calc(33.33% - 10px);
        }
    }

    @media (max-width: 768px) {
        .column {
          
            max-width: calc(50% - 10px);
        }
    }

    @media (max-width: 480px) {
        .column {
            flex: 1 1 100%;
            max-width: 100%;
        }
        .gallery-card {
            aspect-ratio: 4 / 3;
            display: block;/* Slightly rectangular on small screens */
        }
    }
</style>

<main class="xs-main">
    <!-- Banner Section -->
    <section class="xs-banner-inner-section parallax-window"
        style="background-image: url({{ asset('/setting/banner/' . $banner->banner) }});">
        <div class="xs-black-overlay"></div>
        <div class="container">
            <div class="color-white xs-inner-banner-content">
                <h2>Gallery</h2>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="xs-content-section-padding">
        <div class="container" style="max-width: 90%;">

            <!-- Expanded Image Preview -->
            <div class="containers" id="imagePreview">
                <span onclick="closePreview()" class="closebtn">&times;</span>
                <img id="expandedImg" src="">
                <div id="imgtext"></div>
            </div>

            @if ($galary && count($galary) > 0)
                <div class="row">
                    @foreach ($galary as $g)
                        <div class="column">
                            <div class="gallery-card">
                                <img src="{{ asset('/setting/banner/' . $g) }}" alt="Gallery Image"
                                    onclick="openPreview(this);">
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="align-content-center text-center">
                    <h1>Sorry, there are no photos!</h1>
                </div>
            @endif
        </div>
    </section>
</main>

<script>
    function openPreview(imgElement) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        var previewContainer = document.getElementById("imagePreview");

        expandImg.src = imgElement.src;
        imgText.innerHTML = imgElement.alt;
        previewContainer.style.display = "flex";
    }

    function closePreview() {
        document.getElementById("imagePreview").style.display = "none";
    }
</script>
@endsection
