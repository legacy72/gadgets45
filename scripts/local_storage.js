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
	function addToCart(){
		var cart = initCart();

		var product_name = $('.product_title').text().trim();
		var product_price = getPrice($('.product_price').text().trim());
		var product_image = $('.main_image img').attr('src');

		// Инициализируем объект продукта
		var product = {
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
			out += priceFormat(cartData[i]['product_price']);
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
					<div clss="item_drop">
						<button class="item_drop_btn" product_id="` + i + `">X</button>
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


	// Обработчик нажатия кнопки "добавить в корзину"
	$(document).on('click', '.button_add_product_to_cart', function(){
		addToCart();
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


	// Обновление всех данных
	function reloadCart(){
		showCart();
		showFinalOrder();
		editCartBlock();
	}


	// При заходе на страницу обновляем всю инфу
	reloadCart();
});