jQuery(function($){
    var swiper = new Swiper('.product-carousel', {
        slidesPerView: 2,
        spaceBetween: 5,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        breakpoints: {
          600: {
            slidesPerView: 5,
            spaceBetween: 5,
          },
        }
      });
});