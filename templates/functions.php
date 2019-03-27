<?
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
function getAdditionaStringForlQuery($filterSpecs, $order_by){
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

	return $sql;
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