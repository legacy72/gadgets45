<?
// получаем параметры фильртации(строки для вставки конкатенации с основным запросом)
function getFilterParams($filterSpecs){
	// формируем из пришедших на фильтрацию характеристик словарь по типу
	// ['имя_характеристики'] => [':имя_характеристики_0', ':имя_характеристики_1', ...]
	$filterParams = array();

	foreach ($filterSpecs as $specKey => $specValue) {
		$filterParam = array();
		for($i = 0; $i < count($specValue); $i++){
			array_push($filterParam, ':'. $specKey. '_'. $i);
		}
		$filterParams[$specKey] = $filterParam;
	}
	return $filterParams;
}

// формируем параметры для фильтра в зависимости от того, какие чекбоксы были нажаты
function getSpecificationsForFilter(PDO $dbh, $filter = array()){
	// $filter для стартовой страртовой страницы пустой
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