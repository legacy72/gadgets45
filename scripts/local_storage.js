$(document).ready(function() {
	// Цену из строки в инт
	function getPrice(priceString){
		return parseInt(priceString.split('р.')[0].replace(/\s/g, ''));
	}
	// Форматирование числа. Пример: 11999 -> 11 999 р.
	function priceFormat(price){
		return price.toLocaleString('ru-RU') + ' р.';
	}

	// Инициализируем корзину
	function initCart(){
		// Если в корзине что-то есть получаем json ил localStorage
		// Иначе инициализируме пустой массив
		return JSON.parse(localStorage.getItem("cart")) || [];
	}
	// Добавление продукта в корзину
	function addToCart(ptc_id, product_name, product_price, product_image){
		var cart = initCart();

		// Инициализируем объект продукта
		var product = {
			ptc_id: ptc_id,
			product_name: product_name,
			product_price: product_price,
			product_image: product_image,
			product_quantity: 1,
		}
		// Если продукт есть в массиве то увеличиваем его кол-во
		// Иначе добавляем его в массив
		if(cart.some(e => e.product_name === product_name)){
			cart[cart.findIndex(e => e.product_name === product_name)]['product_quantity'] += 1;
		}
		else
			cart.push(product);
		// Добавляем продукты в корзину localStorage
		localStorage["cart"] = JSON.stringify(cart);
	}
	// Вывод корзины
	function showCart(){
		var cartData = initCart();
		var out = '';
		var length = cartData.length || 0;
		for(var i = 0; i < length; i++){
			out += `
			<div class="cart_row">
			<div class="cart_item">
			<div class="item_image">
			`;
			out += `<img src="${cartData[i]['product_image']}">`;
			out += `
			</div>
			<div class="item_description">
			`;
			out += cartData[i]['product_name'];
			out += `
			</div>
			<div class="item_price">
			`;
			out += priceFormat(cartData[i]['product_price'] * cartData[i]['product_quantity']);
			out += `
			</div>
			<div class="item_count">
			<div class="counter_minus" product_id="` + i + `">-</div>
			<div class="item_counter">
			`;
			out += cartData[i]['product_quantity'];
			out += `
			</div>
			<div class="counter_plus" product_id="` + i + `">+</div>
			</div>
			<div class="item_drop">
			<div class="item_drop_btn cross" product_id="` + i + `">X</div>
			</div>
			</div>
			</div>
			`;
		}

		$('.cart_items').html(out);
	}

	// Вывод всей суммы и всего кол-ва товаров в корзине
	function showFinalOrder(){
		sumAndQuantity = getCartSumAndQuantity();
		sum = sumAndQuantity[0].toLocaleString() + ' р.';
		quantity = ''.concat(sumAndQuantity[1], ' шт.'); 
		$('.sum_orders b').html(sum);
		$('.count_orders b').text(quantity)
	}

	// Сумма и количетсво всех товаров в корзине
	function getCartSumAndQuantity(){
		var cartData = initCart();
		var sum = 0;
		var quantity = 0;
		for(var i = 0; i < cartData.length; i++){
			sum += cartData[i]['product_price'] * cartData[i]['product_quantity'];
			quantity += cartData[i]['product_quantity'];
		}
		return [sum, quantity];
	}
	// Изменение значений в корзине
	function editCartBlock(){
		sumAndQuantity = getCartSumAndQuantity();
		sum = sumAndQuantity[0].toLocaleString() + ' р.';
		quantity = '('.concat(sumAndQuantity[1], ')'); 
		$('.cart_price').text(sum);
		$('.cart_quantity').text(quantity);
	}
	// Увеличенине или уменьешение кол-ва продукта на 1
	function editProductQuantity(prod_id, edit_mode){
		var cartData = initCart();
		if (edit_mode === 'increment')
			cartData[prod_id]['product_quantity'] += 1;
		else if(edit_mode === 'decrement' && cartData[prod_id]['product_quantity'] > 1)
			cartData[prod_id]['product_quantity'] -= 1;
		localStorage["cart"] = JSON.stringify(cartData);
		reloadCart();
	}
	// Удаление продукта из корзины	
	function dropProduct(prod_id){
		var cartData = initCart();
		cartData.splice(prod_id, 1);
		localStorage["cart"] = JSON.stringify(cartData);
		reloadCart();
	}


	// Обработчик нажатия кнопки "добавить в корзину" со страницы продукта
	$(document).on('click', '.button_add_product_to_cart', function(){
		var ptc_id = $('.product_container').attr('ptc_id');
		var product_name = $('.product_title').text().trim();
		var product_price = getPrice($('.product_price').text().trim());
		var product_image = $('.main_image img').attr('src');

		addToCart(ptc_id, product_name, product_price, product_image);
		editCartBlock();
	});
	// Обработчик нажатия кнопки "в корзину" со страницы каталога
	$(document).on('click', '.item_button', function(){
		var ptc_id = $(this).parent().find('.item_name').attr('ptc_id');
		var product_name = $(this).parent().find('.item_name').text().trim();
		var product_price = $(this).parent().find('.discount_price').text().trim();
		if(product_price === ''){
			product_price = $(this).parent().find('.standart_price').text().trim();
		}
		var product_image = $(this).parent().find('.item_image')[0].children[0].children[0].src;
		
		addToCart(ptc_id, product_name, product_price, product_image);
		editCartBlock();
	});
	// Обработчик нажатия кнопки "+" (увеличить кол-во продукта на 1)
	$(document).on('click', '.counter_plus', function(){
		editProductQuantity($(this).attr('product_id'), 'increment');
	});
	// Обработчик нажатия кнопки "-" (уменьшить кол-во продукта на 1)
	$(document).on('click', '.counter_minus', function(){
		editProductQuantity($(this).attr('product_id'), 'decrement');
	});
	// Обработчик нажатия на кнопку удаления товара из корзины
	$(document).on('click', '.item_drop_btn', function(){
		dropProduct($(this).attr('product_id'));
	});
	// обработка клика на кнопку "оформить заказ"
	$(document.body).on('click', '.btn_order', function(){
		var streetValid = document.getElementById('street_order').validity.valid;
		if (streetValid){
			var cartData = initCart();
			$.ajax({
				url: '../templates/save_order.php',
				type: 'POST',
				data: {
					'cartData': JSON.stringify(cartData),
					'name': 1,
					'street': $('#street_order').val(),
					'home_number': 2,
					'entrance': 3,
					'apartment': 1,
					'phone': 1,
					'email': 1,
					'comment': 1,
					'payment_type': 1
				},
				success: function(data){
					// todo: Переделать alert на нормальный блок
					alert(data);	
				},
			});
		}

	});

	// Обновление всех данных
	function reloadCart(){
		showCart();
		showFinalOrder();
		editCartBlock();
	}

	// При заходе на страницу обновляем всю инфу
	reloadCart();
});
