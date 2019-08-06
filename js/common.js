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
    $('#personal-data').change(function() {
        if ($('#personal-data').prop('checked')) {
            $('.form-order__btn').attr('disabled', false)
        } else {
            $('.form-order__btn').attr('disabled', true)
        };
    });

    // Quick Order Modal
    $('.button_fast_order').click(function(e) {
        var ptc_id = $('.product_container').attr('ptc_id');
        var product_name = $('.product_title').text().trim();
        var product_price = $('.product_price').text().trim();
        var product_image = $('.main_image img').attr('src');

        $('#quickOrder').attr('ptc_id', ptc_id);
        $('.q-order__pic img').attr('src', product_image);
        $('.q-order__price').html(product_price);
        $('.q-order__head').html(product_name);
        e.preventDefault();
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

    // Thx
    // $('.form-order__btn').click(function () {
    //    $('.box-modal').fadeOut();
    //    $('#loader').fadeIn();
    //    //response
    //    setTimeout(function() {
    //         $('#loader').fadeOut();
    //     }, 1200);
    //    setTimeout(function() {
    //         $('#overlay').fadeIn();
    //         $form.trigger('reset');
    //     }, 1100);                          
    // });
    // $('#overlay').on('click', function() {
    //     $(this).fadeOut();
    // });

    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Проверьте данные"
    );

    // Функция валидации и вывода сообщений
    function valEl(el) {

        el.validate({
            rules: {
                phone: {
                    required: true,
                    regex: '^([\+]+)*[0-9\x20\x28\x29\-]{5,20}$'
                },
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                phone: {
                    required: 'Обязательное поле',
                    regex: 'Телефон может содержать только + - ()'
                },
                name: {
                    required: 'Обязательное поле',
                },
                email: {
                    required: 'Обязательное поле',
                    email: 'Неизвестный E-mail'
                }
            },

            // Начинаем проверку id="" формы
            submitHandler: function(form) {
                $('#loader').fadeIn();
                var $form = $('form.form-send');
                var $formId = $('form.form-send').attr('id');
                switch ($formId) {
                    // Если у формы id="goToNewPage" - делаем:
                    case 'goToNewPage':
                        $.ajax({
                                type: 'POST',
                                url: $form.attr('action'),
                                data: $form.serialize(),
                            })
                            .always(function(response) {
                                //ссылка на страницу "спасибо" - редирект
                                location.href = '#';
                                //отправка целей в Я.Метрику и Google Analytics
                                // ga('send', 'event', 'masterklass7', 'register');
                                // yaCounter27714603.reachGoal('lm17lead');
                            });
                        break;
                    // Если у формы id="popupResult" - делаем:
                    case 'callMe':
                        $.ajax({
                                type: 'POST',
                                url: $form.attr('action'),
                                data: $form.serialize(),
                            })
                            .always(function(response) {
                                setTimeout(function() {
                                    $('#loader').fadeOut();
                                }, 800);
                                setTimeout(function() {
                                    $('#overlay').fadeIn();
                                    $form.trigger('reset');
                                    //строки для остлеживания целей в Я.Метрике и Google Analytics
                                }, 1100);
                                $('#overlay').on('click', function(e) {
                                    $(this).fadeOut();
                                });

                            });
                        break;
                }
                return false;
            }
        })
    }

    // Запускаем механизм валидации форм, если у них есть класс .form
    $('.form-order').each(function() {
        valEl($(this));
    });













});