$(document).ready(function() {
    // анимация телефона
    $('.footer_phone').hover(
        function(event) {
            $('.footer_phone__image').animate({
                opacity: 0
            }, {
                duration: 100,
                done: function() {
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
                done: function() {
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

        if (isUp) {

            button.addClass('expanded');

        } else {

            button.removeClass('expanded');

        }

    });

    // Скрытие/показ характеристик/описание
    $('#product_description').on('click', function() {
        $('.product_info_specs_block').fadeOut("fast");
        $('.product_info_descr_block').fadeIn("fast");
    });
    $('#product_specifications').on('click', function() {
        $('.product_info_descr_block').fadeOut("fast");
        $('.product_info_specs_block').fadeIn("fast");
    });

    // Запрет ввода цифр (для цены)
    $('.price_from').keypress(function(key) {
        if (key.charCode < 48 || key.charCode > 57)
            return false;
    });
    $('.price_to').keypress(function(key) {
        if (key.charCode < 48 || key.charCode > 57)
            return false;
    });
    // Запрет ввода цифр в дом и подъезд
    $('#home_order').keypress(function(key) {
        if (key.charCode < 48 || key.charCode > 57)
            return false;
    });
    $('#entrance_order').keypress(function(key) {
        if (key.charCode < 48 || key.charCode > 57)
            return false;
    });

});