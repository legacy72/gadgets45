$(document).ready(function() {
	// Цену из строки в инт
	function getPrice(priceString){
		return parseInt(priceString.split('р.')[0].replace(/\s/g, ''));
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
	// Очистка корзины
	function clearCart(){
		localStorage.removeItem("cart");
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
			out += cartData[i]['product_price'];
			out += `
					</div>
					<div class="item_count">
						<div class="counter_minus">-</div>
							<div class="item_counter">
			`;
			out += cartData[i]['product_quantity'];
			out += `
							</div>
						<div class="counter_plus">+</div>
					</div>
				</div>
			</div>
			`;
		}

		$('.cart_items').html(out);
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
		quantity = '('.concat(sumAndQuantity[1], ')'); 
		$('.cart_price').text(sumAndQuantity[0]);
		$('.cart_quantity').text(quantity);
	}

	$(document).on('click', '.button_add_product_to_cart', function(){
		addToCart();
		editCartBlock();
	});
	$(document).on('click', '.button_clear_cart', function(){
		clearCart();
		showCart();
	});

	// Вывод корзины
	showCart();
	editCartBlock();
	
});