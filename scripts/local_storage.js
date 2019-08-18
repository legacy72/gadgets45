$(document).ready(function() {
    // Цену из строки в инт
    function getPrice(priceString) {
        return parseInt(priceString.split('р.')[0].replace(/\s/g, ''));
    }
    // Форматирование числа. Пример: 11999 -> 11 999 р.
    function priceFormat(price) {
        return price.toLocaleString('ru-RU') + ' р.';
    }
    // Пост запрос на сохранение заказа
    function saveOrder() {
        var cartData = initCart();
        $.ajax({
            url: '../templates/save_order.php',
            type: 'POST',
            data: {
                'cartData': JSON.stringify(cartData),
                'name': $('#name_customer_order').val(),
                'phone': $('#phone_customer_order').val(),
                'email': $('#email_customer_order').val(),
                'comment': $('#comment_order').val(),
                'street': $('#street_order').val(),
                'home_number': $('#home_order').val(),
                'entrance': $('#entrance_order').val(),
                'apartment': $('#apartment_order').val(),
                'payment_type': 1
            },
            success: function(data) {
                // todo: Переделать alert на нормальный блок
                alert(data);
                localStorage.removeItem('cart');
                reloadCart();
            },
        });
    }

    // Обновление всех данных
    function reloadCart() {
        showCart();
        showFinalOrder();
        editCartBlock();
    }
    // Инициализируем корзину
    function initCart() {
        // Если в корзине что-то есть получаем json ил localStorage
        // Иначе инициализируме пустой массив
        return JSON.parse(localStorage.getItem("cart")) || [];
    }
    // Добавление продукта в корзину
    function addToCart(ptc_id, product_name, product_price, product_image, product_reference) {
        var cart = initCart();

        // Инициализируем объект продукта
        var product = {
                ptc_id: ptc_id,
                product_name: product_name,
                product_price: product_price,
                product_image: product_image,
                product_reference: product_reference,
                product_quantity: 1,
            }
            // Если продукт есть в массиве то увеличиваем его кол-во
            // Иначе добавляем его в массив
        if (cart.some(e => e.product_name === product_name)) {
            cart[cart.findIndex(e => e.product_name === product_name)]['product_quantity'] += 1;
        } else
            cart.push(product);
        // Добавляем продукты в корзину localStorage
        localStorage["cart"] = JSON.stringify(cart);
    }
    // Вывод корзины
    function showCart() {
        var cartData = initCart();
        var out = '';
        var length = cartData.length || 0;
        for (var i = 0; i < length; i++) {
           out += `
            <div class="cart cart_item">
            <div class="cart__close item_drop_btn" product_id="` + i + `">
            <i class="fas fa-times cross"></i>
            </div>
            <div class="cart__body d-flex">
            <div class="cart__pic item_image">
            `;
            out += `<a href="${cartData[i]['product_reference']}" data-title="${cartData[i]['product_name']}">`;
            out += `<img src="${cartData[i]['product_image']}" alt="${cartData[i]['product_name']}">`;
            out += `</a>`;
            out += `
            </div>
            <h4 class="cart__head item_description">
            `;
            out += cartData[i]['product_name'];
            out += `
            </h4>
            <span class="cart__price item_price">
            `;
            out += priceFormat(cartData[i]['product_price'] * cartData[i]['product_quantity']);
            out += `
            </span>
            <div class="cart__count d-flex">
            <i class="fas fa-minus counter_minus" product_id="` + i + `"></i>
            <span class="cart__number item_counter">
            `;
            out += cartData[i]['product_quantity'];
            out += `
            </span>
            <i class="fas fa-plus counter_plus" product_id="` + i + `"></i>
            </div>
            </div>
            </div>
            `;
        }

        $('.cart_items').html(out);
    }

    // Вывод всей суммы и всего кол-ва товаров в корзине
    function showFinalOrder() {
        sumAndQuantity = getCartSumAndQuantity();
        sum = sumAndQuantity[0].toLocaleString() + ' р.';
        quantity = ''.concat(sumAndQuantity[1], ' шт.');
        $('.sum_orders b').html(sum);
        $('.count_orders b').text(quantity)
    }

    // Сумма и количетсво всех товаров в корзине
    function getCartSumAndQuantity() {
        var cartData = initCart();
        var sum = 0;
        var quantity = 0;
        for (var i = 0; i < cartData.length; i++) {
            sum += cartData[i]['product_price'] * cartData[i]['product_quantity'];
            quantity += cartData[i]['product_quantity'];
        }
        return [sum, quantity];
    }
    // Изменение значений в корзине
    function editCartBlock() {
        sumAndQuantity = getCartSumAndQuantity();
        sum = sumAndQuantity[0].toLocaleString() + ' р.';
        quantity = sumAndQuantity[1];
        $('.cart_price').text(sum);
        $('.cart_quantity').text(quantity);
    }
    // Увеличенине или уменьешение кол-ва продукта на 1
    function editProductQuantity(prod_id, edit_mode) {
        var cartData = initCart();
        if (edit_mode === 'increment')
            cartData[prod_id]['product_quantity'] += 1;
        else if (edit_mode === 'decrement' && cartData[prod_id]['product_quantity'] > 1)
            cartData[prod_id]['product_quantity'] -= 1;
        localStorage["cart"] = JSON.stringify(cartData);
        reloadCart();
    }
    // Удаление продукта из корзины	
    function dropProduct(prod_id) {
        var cartData = initCart();
        cartData.splice(prod_id, 1);
        localStorage["cart"] = JSON.stringify(cartData);
        reloadCart();
    }

    // Обработчик нажатия кнопки "в корзину" с главной страницы
    $(document).on('click', '.add_product_to_cart_main', function() {
        var ptc_id = $(this).parent().find('.slide__head').attr('ptc_id');
        var product_name = $(this).closest('.slide').find('h4.slide__head').html().trim();
        var product_price = getPrice($(this).closest('.slide').find('span.slide__price_new').html().trim());
        var product_image = $(this).closest('.slide').find('img').attr('src').trim();
        var product_reference = $(this).closest('.slide').find('a.product_ref').attr('href');

        addToCart(ptc_id, product_name, product_price, product_image, product_reference);
        editCartBlock();

    });

    // Обработчик нажатия кнопки "добавить в корзину" со страницы продукта
    $(document).on('click', '#add_product_to_cart_from_prod', function() {
        var ptc_id = $('.product_container').attr('ptc_id');
        var product_name = $('.product_title').text().trim();
        var product_price = getPrice($('.product_price').text().trim());
        var product_image = $('.main_image img').attr('src');
        var product_reference = window.location.pathname;

        addToCart(ptc_id, product_name, product_price, product_image, product_reference);
        editCartBlock();
    });
    // Обработчик нажатия кнопки "в корзину" со страницы каталога
    $(document).on('click', '.product__btn', function() {
        var ptc_id = $(this).closest('.product').find('.item_name').attr('ptc_id');
        var product_name = $(this).closest('.product').find('.item_name').text().trim();
        var product_price = $(this).closest('.product').find('.discount_price').text().trim();
        if (product_price === '') {
            product_price = $(this).closest('.product').find('.standart_price').text().trim();
        }
        var product_image = $(this).closest('.product').find('.item_image')[0].children[0].children[0].src;
        var product_reference = $(this).closest('.product').find('.item_name a').attr('href');
        product_reference = '/catalog/'.concat(product_reference);

        addToCart(ptc_id, product_name, product_price, product_image, product_reference);
        editCartBlock();
    });
    // Обработчик нажатия кнопки "+" (увеличить кол-во продукта на 1)
    $(document).on('click', '.counter_plus', function() {
        editProductQuantity($(this).attr('product_id'), 'increment');
    });
    // Обработчик нажатия кнопки "-" (уменьшить кол-во продукта на 1)
    $(document).on('click', '.counter_minus', function() {
        editProductQuantity($(this).attr('product_id'), 'decrement');
    });
    // Обработчик нажатия на кнопку удаления товара из корзины
    $(document).on('click', '.item_drop_btn', function() {
        dropProduct($(this).attr('product_id'));
        // блокировка кнопки "оформить заказ", если корзина пустая
        if (initCart().length === 0) {
            $('.button_order').addClass('disabled');
       }
    });
    // обработка клика на кнопку "оформить заказ"
    $(document.body).on('click', '.btn_order', function() {
        var validArray = [];
        validArray.push(document.getElementById('street_order').validity.valid);
        validArray.push(document.getElementById('home_order').validity.valid);
        validArray.push(document.getElementById('entrance_order').validity.valid);
        validArray.push(document.getElementById('apartment_order').validity.valid);
        validArray.push(document.getElementById('name_customer_order').validity.valid);
        validArray.push(document.getElementById('phone_customer_order').validity.valid);
        validArray.push(document.getElementById('email_customer_order').validity.valid);
        validArray.push(document.getElementById('comment_order').validity.valid);

        if (validArray.every(Boolean)) {
            saveOrder();
        }
    });

    // При заходе на страницу обновляем всю инфу
    reloadCart();
});