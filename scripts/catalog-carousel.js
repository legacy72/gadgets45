$(document).ready(function() {
  $('.goods-carousel').slick({
    slidesToShow: 2,
    dots: true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 800,
    easing: 'ease-in-out',
    variableWidth: true,
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

  $('.bestseller-carousel').slick({
    slidesToShow: 4,
    dots: true,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 800,
    easing: 'ease-in-out',
    adaptiveHeight: true,
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

  $('.main-carousel').slick({
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 800,
    easing: 'ease-in-out',
    slidesToScroll: 1,
    prevArrow: null,
    adaptiveHeight: true,
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
});
