$(document).ready(function() {
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
		var product_price = $('.product_price').text().trim();
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
	// Получить данные из корзины
	function getCartData(){
		return JSON.parse(localStorage.getItem('cart'));
	}
	// Вывод корзины
	function showCart(){
		var cartData = getCartData();
		out = '';
		for(var i = 0; i < cartData.length; i++){
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


	$(document).on('click', '.button_add_product_to_cart', function(){
		addToCart();
	});
	$(document).on('click', '.button_clear_cart', function(){
		clearCart();
	});


	showCart();
	
});