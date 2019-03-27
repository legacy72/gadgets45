$(document).ready(function() {
	// заполняем фильтр
	function fillFilter(){
		var filter = {};

	 	$('input.filterCheckBox[type=checkbox]').each(function () {
    		if (this.checked ){
    			// Если по ключу ничего не лежит то инициализируем массив
    			if(!filter[this.name])
    				filter[this.name] = [];
    			filter[this.name].push(this.value);
    		}
		});

        return filter
	}

	// отправляем post запрос с заполненным фильтром
	function acceptFilters(order_by){
		var category_text = $('.catalog_title').text().trim();
		var category_id = 1;
		if (category_text === 'Смартфоны'){
			category_id = 1;
			var filter = fillFilter();			
		}
		else if (category_text === 'Ноутбуки'){
			category_id = 2;
		}
		else if (category_text === 'Аксессуары'){
			category_id = 3;
		}
		$.ajax({
			url: '../templates/items.php',
			type: 'POST',
			data: {
				filter: filter,
				category_id: category_id,
				order_by: order_by,
				price_from: $('.price_from').val(),
				price_to: $('.price_to').val()
			},
		    beforeSend: function(){
		    	// передалать на вертящуюся загрузку
		   		$('.catalog_items_block').html('LOADING... LOADING... LOADING... ');
    		},
			success: function(data){
				
				$('.catalog_items_block').html(data);
			},
		});
	}




	// постраничный вывод продуктов
	$(document).on('click', '.page_num', function(){
		$.ajax({
			url: '../templates/items.php',
			type: 'POST',
			data: {
				page_num: $(this).text(),
			},
		    beforeSend: function(){
		    	// передалать на вертящуюся загрузку
		   		$('.catalog_items_block').html('LOADING... LOADING... LOADING... ');
    		},
			success: function(data){
				
				$('.catalog_items_block').html(data);
			},
		});
	});





	$(document).on('click', '.price_range', function(){
        if ($(this).is(':checked')) {
        	$.ajax({
				url: '../templates/price_range.php',
				type: 'POST',
				data: {
					price_from: $(this).data('min'),
					price_to: $(this).data('max')
				},
				success: function(data){
					$('.price_range__inputs').html(data);
				}
			});
        } 
     
    });


	$(document.body).on('click', '#order_by_asc', function(){
		acceptFilters(order_by = 1);
	});

	$(document.body).on('click', '#order_by_desc', function(){
		acceptFilters(order_by = 2);
	});

	$(document.body).on('click', '.btn_accept_filters', function(){
		acceptFilters();
	});
});