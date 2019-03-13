$(document).ready(function() {

  $('.footer_phone').hover(
  function(event) {
    $('.footer_phone__image').animate({
      opacity: 0
    }, {
      speed: 150,
      complete: function () {
        $('.footer_phone img').attr('src', 'images/phone-white.png');
      }
    });
  },
  function(event) {
    $('.footer_phone__image').animate({
      opacity: 0
    }, {
      speed: 150,
      complete: function () {
        $('.footer_phone img').attr('src', 'images/phone.png');
      }
    });
  });

});
