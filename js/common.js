$(function() {

    // Smooth scrolling
    var $page = $('html, body');
    $('a[href*="#"]').click(function() {
        $page.animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 1000);
        return false;
    });

    // Dropdown Menu
    $('.drop-head').click(function() {
        $('.drop-btn').toggleClass('active');
        $('.drop').slideToggle();
    });

    // Search Button
    $('.search__icon').click(function() {
        $('.search__input').toggleClass('active');
    });

    // Offer SLider
    $('.offer-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1000,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        slidesToShow: 1,
        responsive: [{
                breakpoint: 768.02,
                settings: {
                    variableWidth: true
                }
            },
            {
                breakpoint: 576.02,
                settings: {
                    variableWidth: false
                }
            }
        ]
    });

    // Shares-Slider
    $('.shares-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1000,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        variableWidth: false,
        slidesToShow: 2,
        dots: true,
        appendDots: $('.shares-slider__dots'),
        responsive: [{
            breakpoint: 768.02,
            settings: {
                slidesToShow: 1
            }
        }]
    });

    // Bestseller-Slider
    $('.bestseller-slider').slick({
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1000,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        variableWidth: true,
        slidesToShow: 4,
        responsive: [{
                breakpoint: 992.02,
                settings: {
                    variableWidth: false,
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 576.02,
                settings: {
                    variableWidth: false,
                    slidesToShow: 1
                }
            }
        ]
    });

    // Personal Data Agreement Check
    $('#personal-data').change(function() {
        if ($('#personal-data').prop('checked')) {
            $('.form-order__btn').attr('disabled', false)
        } else {
            $('.form-order__btn').attr('disabled', true)
        };
    });

    // Quick Order Modal
    $('.button_fast_order').click(function(e) {
        var picture = $(this).closest('.slide').find('img').attr('src');
        var price = $(this).closest('.slide').find('span.slide__price_new').html();
        var name = $(this).closest('.slide').find('h4.slide__head').html();
        $('.q-order__pic img').attr('src', picture);
        $('.q-order__price').html(price);
        $('.q-order__head').html(name);
        e.preventDefault();
        $('#quickOrder').arcticmodal({
            overlay: {
                css: {
                    backgroundColor: '#9a85b2',
                    opacity: .75
                }
            }
        });
    });

    $('a.call-me').click(function(e) {
        e.preventDefault();
        $('#callMe').arcticmodal({
            overlay: {
                css: {
                    backgroundColor: '#9a85b2',
                    opacity: .75
                }
            }
        });
    });


});