$(document).ready(function() {
   var
      smallImages = $('.small_images'),
      countSmallImages = smallImages.find('.small_img').length;


   if (countSmallImages > 3) {
      smallImages.addClass('slider-small-images');

      $('.slider-small-images').slick({
        slidesToShow: 3,
        dots: false,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3500,
        speed: 900,
        easing: 'ease-in-out',
        responsive: [
        {
          breakpoint: 556,
          settings: {
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
      ]
      });
   } else {
      smallImages.addClass('small-images_container');
   }

});
