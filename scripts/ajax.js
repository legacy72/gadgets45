$(document).ready(function() {
	$(document.body).on('click', '.btn_accept_filters', function(){
		var category_text = $('.catalog_title').text().trim();
		var category_id = 1;
		if (category_text === 'Смартфоны'){
			category_id = 1;
		}
		else if (category_text === 'Ноутбуки'){
			category_id = 2;
		}
		else if (category_text === 'Аксессуары'){
			category_id = 3;
		}
		$.post(
			'../templates/items.php',
			{
				category_id: category_id,
				price_from: $('.price_from').val(),
				price_to: $('.price_to').val()
			},
			function(data){
				$('.catalog_items').html(data);
			});
	});
});