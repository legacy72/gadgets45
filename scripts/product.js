$(document).ready(function() {
   var
      smallImages = $('.small_images'),
      countSmallImages = smallImages.find('.small_img').length;

      if (countSmallImages > 3) {
         smallImages.addClass('slider-small-images');
      } else {
         smallImages.addClass('small-images_container');
      }

      $('.slider-main-image').slick({
        slidesToShow: 1,
        dots: false,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-small-images'
      });

      $('.slider-small-images').slick({
        slidesToShow: countSmallImages > 3 ? 3 : countSmallImages,
        centerMode: true,
        centerPadding: '1px',
        dots: false,
        slidesToScroll: 1,
        speed: 900,
        easing: 'ease-in-out',
        asNavFor: '.slider-main-image',
        focusOnSelect: true
      });

});
