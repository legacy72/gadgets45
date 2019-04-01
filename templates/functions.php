<?
require_once 'config.php';
// Получить кол-во всех элементов словаря (сумма  кол-ва элементов по всем ключам)
function getCountOfDictItems($dict){
	$len = 0;
	foreach($dict as $d){
		$len += count($d);
	}
	return $len;
}

// формируем параметры для фильтра в зависимости от того, какие чекбоксы были нажаты
function getSpecificationsForFilter(PDO $dbh, $filter = array()){
	// $filter для стартовой страртовой страницы пустой
	// Return:
	// dict - словарь характерстик
	$filterSpecifications = array();
	foreach ($filter as $filterKey => $filterValue) {
		$filterValues = array();
		for ($i = 0; $i < count($filterValue); $i++){
			array_push($filterValues, $filterValue[$i]);
		}
		$filterSpecifications[$filterKey] = $filterValues;
	}
	return $filterSpecifications;
}

// Генерируме допонительную строку (фильтрация) для основного селекта
function getAdditionaStringForlQuery($filterSpecs, $order_by, $limit = False, $offset = 0){

	$sql = '';
	// если фильтр пустой, то возвращаем все, не накладывая никаких условий
	if(empty($filterSpecs)){
		$sql .= '	    
		    GROUP BY T.image_name
		';
	}
	else{
		$sql .= '	    
			JOIN Filter F ON F.specification_id = T.specification_id AND F.value = T.value
		    GROUP BY T.image_name
			HAVING COUNT(*) = :count_filters
		';
	}
	// сортировка по возрастанию/убыванию цены
	$order_by_string = '';
	if($order_by == 1){
		$order_by_string = 'ORDER BY T.discount_price ASC';
	}
	else if($order_by == 2){
		$order_by_string = 'ORDER BY T.discount_price DESC';
	}

	$sql .= $order_by_string;

	if($limit)
		$sql .= ' LIMIT '. PRODUCTS_ON_PAGE. ' OFFSET '. $offset;

	return $sql;
}
// Получить характерстики на русском конкретной категории для вывода фильтров
function getRusAndIDSSpecifications($categoryID){
	if ($categoryID == 1)
		return array(SMARTPHONES_SPECIFICATIONS_ENG_TO_RUS, SMARTPHONES_SPECIFICATIONS_NAME_TO_INDEX);
	if ($categoryID == 2)
		return array(NOTEBOOKS_SPECIFICATIONS_ENG_TO_RUS, NOTEBOOKS_SPECIFICATIONS_NAME_TO_INDEX);
	return array(array(), array());
}

// Получить массив страниц для вывода
function getPageNumbers($countPages, $currentPage){
	$pagesList = array();
	for($i = 1; $i <= $countPages; $i++){
		if($i == 1 && abs($currentPage - $i) != 1)
			array_push($pagesList, $i);
		if($i == $countPages && abs($currentPage - $i) != 1)
			array_push($pagesList, $i);
		if(abs($currentPage - $i) == 1 || abs($currentPage - $i) == 0)
			array_push($pagesList, $i);
	}
	$pagesList = array_values(array_unique($pagesList));
	return $pagesList;
}
// Вывод номеров страниц
function showPageNumbers($countPages, $currentPage){
	$pagesList = getPageNumbers($countPages, $currentPage);
	for($i = 0; $i < count($pagesList); $i++){
		if($pagesList[$i] === $currentPage)
			echo '<span class="page_num current_page" value="'. $pagesList[$i]. '">'. $pagesList[$i]. '</span>';
		else
			echo '<span class="page_num" value="'. $pagesList[$i]. '">'. $pagesList[$i]. '</span>';
		if($pagesList[$i] != ($pagesList[$i + 1] - 1) && $i != count($pagesList) - 1)
			echo('...');
		echo(' ');
	}
}

// Количество страниц для вывода всех продуктов
function getCountPages($countProducts){
	return ceil($countProducts / PRODUCTS_ON_PAGE);
}

// Возвращаем название цвета если он не 'standart'
function getColorName($color){
	return $color != 'standart' ? ucfirst($color) : ''; 
}
// Форматирование числа. Пример: 11999 -> 11 999 р.
function priceFormat($price){
	return number_format($price, '0', ',', ' '). ' р.';
}

// Получить основную картинку продукта
function getMainAndAdditionalImages($productImages){
	$mainImage = "";
	$additionalImages = array();
	foreach ($productImages as $prodImage) {
		if ($prodImage['is_main'] === NULL){
			array_push($additionalImages, $prodImage['name']);
		}
		else{
			$mainImage = $prodImage['name'];
		}
	}
	return array($mainImage, $additionalImages);
}

// получить основные характеристики продукта на русском
function getMainProductSpecifications($productSpecs, $category_name){
	$mainSpecs = array();
	if ($category_name === 'smartphones')
		$productMainSpecs = SMARTPHONES_MAIN_SPECS;
	else if ($category_name === 'notebooks')
		$productMainSpecs = NOTEBOOKS_MAIN_SPECS;
	else if ($category_name === 'accessories')
		$productMainSpecs = ACCESSORIES_MAIN_SPECS;

	foreach($productSpecs as $productSpec){
		if (in_array($productSpec['specification_name'], $productMainSpecs)){
			$key = $productSpec['specification_name_ru'];
			$value = $productSpec['specification_value'];
			$mainSpecs[$key] = $value;
		}
	}
	return $mainSpecs;
}


// Группируем характеристики по их категории
function getSpecificationsByGroups($specifications){
	$specsByGroup = array();
	$specificationsArr = array();
	// Идем во всем характеристикам и смотрим к какой группе она (хар-ка) относится
	// Если в новом словарем с группами такой категории нет то создаем и записываем
	// туда первую характеристику
	// Если такая категория уже есть то добавляем по указанному ключу дополнительную характеристику
	foreach($specifications as $spec){
		if(!array_key_exists($spec['specifiaction_group'], $specsByGroup)){
			$specificationsArr = array();
			$dict = array(
				$spec['specification_name_ru'] => $spec['specification_value'],
			);
			$specsByGroup[$spec['specifiaction_group']] = array($dict);
		}
		else{
			$dict = array(
				$spec['specification_name_ru'] => $spec['specification_value'],
			);
			array_push($specsByGroup[$spec['specifiaction_group']], $dict);
		}
	}

	return $specsByGroup;
}