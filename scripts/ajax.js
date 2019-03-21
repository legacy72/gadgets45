$(document).ready(function() {
	// заполняем фильтр
	function fillFilter(){
		var filter = {};
	 	var ram_size_list = [];
	 	var number_of_processor_cores_list = [];
        $.each($("input[name='ram_size']:checked"), function(){            
            ram_size_list.push($(this).val());
        });
        $.each($("input[name='number_of_processor_cores']:checked"), function(){            
            number_of_processor_cores_list.push($(this).val());
        });
        filter['ram_size'] = ram_size_list;
        filter['number_of_processor_cores'] = number_of_processor_cores_list;
        console.log(filter);

        return filter
	}

	// отправляем post запрос с запоненным фильтром
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
		$.post(
			'../templates/items.php',
			{
				filter: filter,
				category_id: category_id,
				order_by: order_by,
				price_from: $('.price_from').val(),
				price_to: $('.price_to').val()
			},
			function(data){
				$('.catalog_items').html(data);
			}
		);
	}



	$(document).on('click','.price_range',function () {
        if ($(this).is(':checked')) {
        	$.post(
				'../templates/price_range.php',
				{
					price_from: $(this).data('min'),
					price_to: $(this).data('max')
				},
				function(data){
					$('.price_range__inputs').html(data);
				}
			);
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