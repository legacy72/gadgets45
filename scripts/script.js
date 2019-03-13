$(document).ready(function() {

  $('.footer_phone').hover(
  function(event) {
    $('.footer_phone__image').animate({
      opacity: 0
    }, {
      duration: 100,
      done: function () {
        $('.footer_phone img').attr('src', 'images/white_phone.png');
      }
    }).animate({
      opacity: 1
    }, {
      duration: 100,

    });
  },
  function(event) {
    $('.footer_phone__image').animate({
      opacity: 0
    }, {
      duration: 100,
      done: function () {
        $('.footer_phone img').attr('src', 'images/phone.png');
      }
    }).animate({
      opacity: 1
    }, {
      duration: 100
    });
  });
});
