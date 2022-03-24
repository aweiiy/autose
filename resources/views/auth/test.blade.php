<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
<!-- Carousel inside card -->
<div class="card card-hover">
    <div class="tns-carousel-wrapper card-img-top card-img-hover">
        <span class="img-overlay"></span>
        <div class="tns-carousel-inner">
            <img src="http://127.0.0.1/listing_images/43-image-1648150747694.jpg" alt="Image">
        </div>
    </div>
    <div class="card-body">
        <img src="http://127.0.0.1/listing_images/43-image-1648150747694.jpg" alt="Image">
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script>
    var slider = tns({
        container: '.card-hover',
        items: 1,
        speed: 100,
        navPosition: "bottom",
        mouseDrag: !0,
        autoplayHoverPause: !0,
        autoplayButtonOutput: !1
    });
</script>
