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

  $('.collapse').on('show.bs.collapse', function(event) {

    var parentNode = $(this.parentElement),
        headerLink = parentNode.find('.header-menu-link');

    headerLink.addClass('expanded');
    headerLink.addClass('gray-colored');

  });

  $('.collapse').on('hide.bs.collapse', function(event) {

    var parentNode = $(this.parentElement),
        headerLink = parentNode.find('.header-menu-link');

    headerLink.removeClass('expanded');
    headerLink.removeClass('gray-colored');
  });

  $('.dropdown-menu__row').on('click', function(event) {
    var isUp = $(this).attr('value') === 'up' ? true : false,
        dropdown = $(this).parent().parent(),
        button = dropdown.find('button');

    if(isUp) {

      button.addClass('expanded');

    } else {

      button.removeClass('expanded');

    }

  });

});
