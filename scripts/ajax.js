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

        return filter
    }
    // Получаем вид сортировки (по убыванию/возрастанию)
    function getOrderBy() {
        // Если есть expanded значит стоит сортировка по возрастанию
        if ($('.dropdown-toggle').hasClass('expanded')) {
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
        var category_text = $('.catalog_title').text().trim();
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
                $('.catalog_items_block').html('LOADING... LOADING... LOADING... ');
            },
            success: function(data) {
                $('.catalog_items_block').html(data);
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
    $(document.body).on('click', '.btn_accept_filters', function() {
        var data = getFiltersData();
        acceptFilters(data);
    });
});