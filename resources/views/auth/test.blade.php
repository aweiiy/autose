<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
<div class="my-slider">
    <div><img src="/listing_images/30-image-1647963547188.jpg"></div>
    <div><img src="/listing_images/30-image-1647963547188.jpg"></div>
    <div><img src="/listing_images/30-image-1647963547188.jpg"></div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script>
    var slider = tns({
        container: '.my-slider',
        items: 1,
        responsive: {
            1: {
                edgePadding: 20,
                gutter: 20,
                items: 1,
                mouseDrag: true
            },
            700: {
                gutter: 30,
                mouseDrag: true
            },
            900: {
                items: 1,
                mouseDrag: true
            }
        }
    });
</script>
