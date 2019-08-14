$(document).ready(function() {
    var categoryRusToEng = {
        'Смартфоны': 'smartphones',
        'Ноутбуки': 'notebooks',
        'Аксессуары': 'accessories',
    }
    var categoryTextToID = {
            'Смартфоны': 1,
            'Ноутбуки': 2,
            'Аксессуары': 3,
        }
        // заполняем фильтр
    function fillFilter() {
        var filter = {};

        $('input.filterCheckBox[type=checkbox]').each(function() {
            if (this.checked) {
                // Если по ключу ничего не лежит то инициализируем массив
                if (!filter[this.name])
                    filter[this.name] = [];
                filter[this.name].push(this.value);
            }
        });
        return filter;
    }
    // Получаем вид сортировки (по убыванию/возрастанию)
    function getOrderBy() {
        // Если есть expanded значит стоит сортировка по возрастанию
        if ($('.dropdown-toggle').children('option:selected').hasClass('expanded')) {
            order_by = 1;
        } else {
            order_by = 2;
        }
        return order_by;
    }
    // Поулучаем название категории
    function getCategoryName(category_text) {
        return categoryRusToEng[category_text];
    }

    // Получаем категорию тоаров
    function getCategoryID(category_text) {
        return categoryTextToID[category_text];
    }
    //получаем основные данные для фильтрации
    function getFiltersData() {
        var category_text = $('.catalog__title').text().trim();
        return {
            filter: fillFilter(),
            category_id: getCategoryID(category_text),
            category_name: getCategoryName(category_text),
            order_by: getOrderBy(),
            price_from: $('.price_from').val(),
            price_to: $('.price_to').val()
        };
    }
    // отправляем get запрос с заполненным фильтром
    function acceptFilters(data) {
        $.ajax({
            url: '../templates/items.php',
            type: 'GET',
            data: data,
            beforeSend: function() {
                // передалать на вертящуюся загрузку
                $('.catalog_items_block').html('<span class="nothing"><img src="/images/loader.svg" alt="Загрузка..."></span>');
            },
            success: function(data) {
                if(data !== ''){
                    $('.catalog_items_block').html(data);
                }
                else {
                    $('.catalog_items_block').html('<div class="nothing no-data"><img class="gear" src="../images/loader.svg" alt="Загрузка"> Gadgets45</div>');
                }
            }
        });
    }

    // Аякс запрос на страницу с заказом обратного звонка
    function requestCallBack() {
        $('#loader').fadeIn();
        $.ajax({
            url: '../templates/request_call_back.php',
            type: 'POST',
            data: {
                'name': $('#name_customer_call_back').val(),
                'phone': $('#phone_customer_call_back').val(),
                'email': $('#email_customer_call_back').val(),
                'comment': $('#comment_call_back').val(),
            },
            success: function(data) {
                $('#loader').fadeOut();
                
                setTimeout(function() {
                    $('.respond-overlay').fadeIn();
                }, 500);
                $('.arcticmodal-container').fadeOut();
                $('.respond-to-call').html(data);

                $('.respond-overlay').on('click', function() {
                    $('.arcticmodal-overlay').trigger('click');
                    $(this).fadeOut();
                });     

            }
                
        });
        return false;
    }

    // Аякс запрос на страницу сохранения заказа, когда выбран вариант "Быстрый заказ"
    function quickOrder(cartData, defaultInfo) {
        $.ajax({
            url: '/templates/save_order.php',
            type: 'POST',
            data: {
                'cartData': JSON.stringify(cartData),
                'name': $('#name_customer_quick_order').val(),
                'phone': $('#phone_customer_quick_order').val(),
                'email': $('#email_customer_quick_order').val(),
                'comment': $('#comment_quick_order').val(),
                'street': defaultInfo,
                'home_number': defaultInfo,
                'entrance': defaultInfo,
                'apartment': defaultInfo,
                'payment_type': defaultInfo
            },
            success: function(data) {
                // todo: Переделать alert на нормальный блок
                alert(data);
            },
        });
    }

    // присваивание инпутам цены значение радиобаттанов
    $(document).on('click', '.price_range', function() {
        if ($(this).is(':checked')) {
            $.ajax({
                url: '../templates/price_range.php',
                type: 'GET',
                data: {
                    price_from: $(this).data('min'),
                    price_to: $(this).data('max')
                },
                success: function(data) {
                    $('.price_range__inputs').html(data);
                }
            });
        }
    });

    // обработка клика на постраничный вывод продуктов
    $(document).on('click', '.page_num', function() {
        var data = getFiltersData();
        data['page_num'] = $(this).text();
        acceptFilters(data);
    });

    // обработка клика на сортировку по возрастанию/убыванию
    $(document.body).on('click', '.price_sort_order_by', function() {
        var data = getFiltersData();
        acceptFilters(data);
    });

    // обработка клика на применение фильтров
    $(document.body).on('click', '.accept-filters__btn', function() {
        var data = getFiltersData();
        acceptFilters(data);
    });

    // обработка клика на кнопку "отправить" в заказе обратного звонка
    $(document).on('click', '#request_call_back', function() {
        var validArray = [];
        validArray.push(document.getElementById('name_customer_call_back').validity.valid);
        validArray.push(document.getElementById('phone_customer_call_back').validity.valid);
        validArray.push(document.getElementById('email_customer_call_back').validity.valid);
        validArray.push(document.getElementById('comment_call_back').validity.valid);

        if (validArray.every(Boolean)) {
            requestCallBack();
        }
    });

    // Обработка клика на кнопку "Купить" в модальном окне быстрого заказа
    $('#quick-order__btn').click(function() {
        var defaultInfo = -1;
        var cartData = [{
            'ptc_id': $('#quickOrder').attr('ptc_id'),
            'product_name': $('.q-order__head').text().trim(),
            'product_price': $('.q-order__price').text().trim(),
            'product_image': $('.q-order__pic img').attr('src').trim(),
            'product_quantity': 1,
            'product_reference': window.location.pathname
        }];
        quickOrder(cartData, defaultInfo);
    });

});