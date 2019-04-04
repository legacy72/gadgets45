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

		// Инициализируем объект продукта
		var product = {
			product_name: product_name,
			product_price: product_price,
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


	$(document).on('click', '.button_add_product_to_cart', function(){
		addToCart();
	});
	$(document).on('click', '.button_clear_cart', function(){
		clearCart();
	});
	
});