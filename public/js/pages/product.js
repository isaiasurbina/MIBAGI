jQuery(function($){
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        slidesPerView: 5,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.main-gallery-container', {
        spaceBetween: 10,
        thumbs: {
            swiper: galleryThumbs
        }
    });
});