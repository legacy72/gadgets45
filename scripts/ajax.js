$(document).ready(function() {
	function fillFilter(){
		var filter = {};
	 	var ram_size_list = [];
	 	var number_of_processor_cores_list = [];
        $.each($("input[name='ram_variant']:checked"), function(){            
            ram_size_list.push($(this).val());
        });
        $.each($("input[name='number_of_processor_cores_variant']:checked"), function(){            
            number_of_processor_cores_list.push($(this).val());
        });
        filter['ram_size'] = ram_size_list;
        filter['number_of_processor_cores'] = number_of_processor_cores_list;
        console.log(filter);

        return filter
	}

	$(document.body).on('click', '.btn_accept_filters', function(){
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
				price_from: $('.price_from').val(),
				price_to: $('.price_to').val()
			},
			function(data){
				$('.catalog_items').html(data);
			});
	});
});