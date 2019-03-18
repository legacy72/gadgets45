$(document).ready(function() {
  $('.goods-carousel').slick({
    slidesToShow: 2,
    dots: true,
    slidesToScroll: 1,
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
});
