$(function() {

   

    // Smooth scrolling
    var $page = $('html, body');
    $('a[href*="#"]').click(function() {
        $page.animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 1000);
        return false;
    });

    // AutoHeight
    $('.bestseller-slider .slide').matchHeight();

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
    var name = $('#name_customer_quick_order');
    var phone = $('#phone_customer_quick_order');
    var email = $('#email_customer_quick_order');

    $('#quickOrder input').on('focus', function() {
        // if(name.valid() && phone.valid() && email.valid()){
        if(name.val() !='' && phone.val() !='' && email.val() !=''){
        // if(name.length !=0 && phone.length !=0 && email.length !=0){
            $('#personal-data').change(function() {
                if ($('#personal-data').prop('checked')) {
                    $('.form-order__btn').attr('disabled', false);
                } else {
                    $('.form-order__btn').attr('disabled', true);
                }
            }); 
        } else {
            $('.form-order__btn').attr('disabled', true);
        }
    });

    // Quick Order Modal
    $('.button_fast_order').click(function(e) {
        e.preventDefault();
        var ptc_id = $('.product_container').attr('ptc_id');
        var product_name = $('.product_title').text().trim();
        var product_price = $('.product_price').text().trim();
        var product_image = $('.main_image img').attr('src');

        $('#quickOrder').attr('ptc_id', ptc_id);
        $('.q-order__pic img').attr('src', product_image);
        $('.q-order__price').html(product_price);
        $('.q-order__head').html(product_name);
        $('#quickOrder').arcticmodal({
            overlay: {
                css: {
                    backgroundColor: '#000',
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
                    backgroundColor: '#000',
                    opacity: .75
                }
            }
        });
    });
    // Tech-mnu
    $('.tech-mnu__item').click(function () {
        $('.tech-mnu__item').removeClass('active');
        $(this).addClass('active');
    });

    // Accordion
    $( '.filter__part' ).accordion({
        collapsible: true,
        header: '.filter__head',
        heightStyle: 'content',
        active: 1,
        // animate: 700
    });
  
    $('.filter__head').click(function () {
        $(this).find('i').toggleClass('expanded');
    });

   

    // Nothing was founded 
    $(window).on('load', function () {
        var blockHeight = $('.products').css('height');

        if($(blockHeight) < 1) {
            $('.nothing').css('display', 'block');
        }
       
    })

    // Filter Toggle
    $('.filter-toggle').click(function () {
        $('.filter').slideToggle(400);
        $('.filter-toggle').find('i').toggleClass('expanded');
    });

    // Price Animation
    $.fn.extend({ 

        addTemporaryClass: function(className, duration) {
            var elements = this;
            setTimeout(function() {
                elements.removeClass(className);
            }, duration);

            return this.each(function() {
                $(this).addClass(className);
            });
        }
    });

    $('body').on('click', '.product__btn',  function () {  
        $(this).find('span').addTemporaryClass('added', 1500);
    });

    // Fixed Shopping Cart
    $('.fixed-shop').click(function () {
        $(this).toggleClass('active');
    });


    // Magnific Popup
    $('.main_image').magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true
        },
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300, 
            opener: function(element) {
                return element.find('img');
            }
        }
        
    });

    // Block Order Button
    
     

});

function disableOrderButton(){
    let item = JSON.parse(localStorage.getItem("cart"));

    if (item.length === 0) {
         $('.button_order').addClass('disabled');
    }
}


    $(window).on('load', function () {
        disableOrderButton();
    });
    // добавь событие на клик крестика в списке продуктов
    $('body').on('click', '.твой_класс',  function () {
        disableOrderButton();
    });

  // Preloader
    $(window).on('load', function() {
        $('.preloader').fadeOut(800);
    });