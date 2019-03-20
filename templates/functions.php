<?
// формируем параметры для фильтра в зависимости от того, какие чекбоксы были нажаты
function getSpecificationsForFilter(PDO $dbh, $filter = array()){
	// $filter для стартовой страртовой страницы пустой
	// Return:
	// array[0] - словарь характерстик
	// array[1] - словарь характеристик со строками, которые нужно вставить в основной запрос
	$filterSpecifications = array();
	$filterStringParams = array();
	foreach ($filter as $filterKey => $filterValue) {
		$filterValues = array();
		$filterStringParam = array();
		for ($i = 0; $i < count($filterValue); $i++){
			array_push($filterValues, $filterValue[$i]);
			array_push($filterStringParam, ':'. $filterKey. '_'. $i);
		}
		$filterSpecifications[$filterKey] = $filterValues;
		$filterStringParams[$filterKey] =  $filterStringParam;
	}
	return array($filterSpecifications, $filterStringParams);
}

// Генерируем параметры категорий, по которым нужно фильтровать
function generateBindParams($filterSpecs){
	// пример ретерна
	// $arr = array(
	// 	'number_of_processor_cores_0' => 4,
	// 	'number_of_processor_cores_1' => 8,
	// 	'ram_size_0' => 2,
	// 	'ram_size_1' => 4,
	// 	'ram_size_2' => 6,
	// );
	$bindParams = array();
	foreach ($filterSpecs as $filterKey => $filterValue) {
		for($i = 0; $i < count($filterValue); $i++){
			$key = $filterKey. '_'. $i;
			$value = $filterSpecs[$filterKey][$i];

			$bindParams[$key] = $value;
		}
	}
	return $bindParams;
}