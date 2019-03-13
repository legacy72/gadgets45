$(document).ready(function() {
  $('.phone-carousel').slick({
    infinite: true,
    slidesToShow: 5,
    dots: true,
    slidesToScroll: 1,
    variableWidth: true,
    centerMode: true,
    centerPadding: '60px',
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
