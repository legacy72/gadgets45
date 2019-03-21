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

// Генерируме допонительную строку (фильтрация) для основного селекта
function getAdditionaStringForlQuery($filterSpecs, $filterStringParams, $order_by){
	$sql = '';
	// если выбраны чекбоксы фильтров добавляем условия
	if (array_key_exists('number_of_processor_cores', $filterSpecs)  && count($filterSpecs['number_of_processor_cores']) > 0){
		$addSql = 'AND pts8.value IN ('.implode(',', $filterStringParams['number_of_processor_cores']).') ';
		$sql .= $addSql;
	}
	if (array_key_exists('ram_size', $filterSpecs) && count($filterSpecs['ram_size']) > 0){
		$addSql = 'AND pts11.value IN ('.implode(',', $filterStringParams['ram_size']).') ';
		$sql .= $addSql;
	}
	if (array_key_exists('brand', $filterSpecs) && count($filterSpecs['brand']) > 0){
		$addSql = 'AND pts1.value IN ('.implode(',', $filterStringParams['brand']).') ';
		$sql .= $addSql;
	}
	if (array_key_exists('screen_diagonal', $filterSpecs) && count($filterSpecs['screen_diagonal']) > 0){
		$addSql = 'AND pts2.value IN ('.implode(',', $filterStringParams['screen_diagonal']).') ';
		$sql .= $addSql;
	}
	if (array_key_exists('processor_model', $filterSpecs) && count($filterSpecs['processor_model']) > 0){
		$addSql = 'AND pts7.value IN ('.implode(',', $filterStringParams['processor_model']).') ';
		$sql .= $addSql;
	}
	if (array_key_exists('amount_of_internal_memory', $filterSpecs) && count($filterSpecs['amount_of_internal_memory']) > 0){
		$addSql = 'AND pts12.value IN ('.implode(',', $filterStringParams['amount_of_internal_memory']).') ';
		$sql .= $addSql;
	}


	// сортировка по возрастанию/убыванию цены
	$order_by_string = '';
	if($order_by == 1){
		$order_by_string = 'ORDER BY ptc.discount_price ASC';
	}
	else if($order_by == 2){
		$order_by_string = 'ORDER BY ptc.discount_price DESC';
	}

	$sql .= $order_by_string;

	return $sql;
}

// динамически формируем параметры
function bindDynamicParams(PDO $dbh, $sth, $values, $types = false) {
    foreach($values as $key => $value) {
        if($types) {
            $sth->bindValue(":$key",$value,$types[$key]);
        } else {
            if(is_int($value))        { $param = PDO::PARAM_INT; }
            elseif(is_bool($value))   { $param = PDO::PARAM_BOOL; }
            elseif(is_null($value))   { $param = PDO::PARAM_NULL; }
            elseif(is_string($value)) { $param = PDO::PARAM_STR; }
            else { $param = FALSE; }

            if($param) $sth->bindValue(":$key", $value, $param);
        }
    }

    return $sth;
}