<?
require_once 'connection.php';

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

// получаем все виды характеристик смартфонов
function getSmartphonesSpecifications(PDO $dbh){
	$sth = $dbh->prepare('
		SELECT DISTINCT specification_id, value FROM ProductToSpecification
		JOIN Specification ON Specification.id = ProductToSpecification.specification_id
		WHERE Specification.category_id = 1
		ORDER BY value
	');
	$sth->execute();
	$specifications = $sth;
	return $specifications->fetchAll();
}

// получаем параметры для фильртации
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

// Получаем характериситки, по которым будем фильтровать
function getSpecificationsForFilter(PDO $dbh){
	$filterSpecifications = array();
	$number_of_processor_cores = array();
	$ram_size = array();

	$specifications = getSmartphonesSpecifications($dbh);

	foreach($specifications as $spec){
		if($spec['specification_id'] == SPECIFICATIONS_DICT['number_of_processor_cores'])
			array_push($number_of_processor_cores, $spec['value']);
		else if($spec['specification_id'] == SPECIFICATIONS_DICT['ram_size'])
			array_push($ram_size, $spec['value']);
	}
	$filterSpecifications['number_of_processor_cores'] = $number_of_processor_cores;
	$filterSpecifications['ram_size'] = $ram_size;
	return $filterSpecifications;
}


function getSmartphones(PDO $dbh, $price_from = 1, $price_to = 999999){
	$filterSpecs = getSpecificationsForFilter($dbh);
	$filterParams = getFilterParams($filterSpecs);

	$sql = '
		SELECT  
			Image.name AS image_name, 
			Product.name AS product_name, 
		    Color.name AS color_name,
		    ptc.price,
		    ptc.discount_price,
		    ptc.quantity
		FROM Image
			JOIN Color ON Color.id = Image.color_id
			JOIN Product ON Product.id = Image.product_id
		    JOIN ProductToColor ptc ON ptc.product_id = Product.id AND ptc.color_id = Color.id
		    JOIN ProductToSpecification pts8 ON pts8.product_id = Product.id AND pts8.specification_id = 8
            JOIN ProductToSpecification pts11 ON pts11.product_id = Product.id AND pts11.specification_id = 11
		WHERE Product.category_id = 1
		AND Image.is_main = 1
        AND ptc.discount_price BETWEEN :price_from AND :price_to
        AND pts8.value IN ('.implode(',', $filterParams['number_of_processor_cores']).')
        AND pts11.value IN ('.implode(',', $filterParams['ram_size']).')
	';



	$sth = $dbh->prepare($sql);
	$sth->bindParam(':price_from', $price_from, PDO::PARAM_INT);
	$sth->bindParam(':price_to', $price_to, PDO::PARAM_INT);

	// todo: автоматизировать
	$arr = array(
		'number_of_processor_cores_0' => $filterSpecs['number_of_processor_cores'][0],
		'number_of_processor_cores_1' => $filterSpecs['number_of_processor_cores'][1],
		'number_of_processor_cores_2' => $filterSpecs['number_of_processor_cores'][2],
		'ram_size_0' => $filterSpecs['ram_size'][0],
		'ram_size_1' => $filterSpecs['ram_size'][1],
		'ram_size_2' => $filterSpecs['ram_size'][2],
	);

	$sth = bindDynamicParams($dbh, $sth, $arr);

	$sth->execute();
	$products = $sth;
	return $products->fetchAll();
}






function getNotebooks(PDO $dbh, $price_from = 1, $price_to = 999999){
	$sth = $dbh->prepare('
		SELECT  
			Image.name AS image_name, 
			Product.name AS product_name, 
		    Color.name AS color_name,
		    ptc.price,
		    ptc.discount_price,
		    ptc.quantity
		FROM Image
			JOIN Color ON Color.id = Image.color_id
			JOIN Product ON Product.id = Image.product_id
		    JOIN ProductToColor ptc ON ptc.product_id = Product.id AND ptc.color_id = Color.id
		    JOIN ProductToSpecification pts ON pts.product_id = Product.id
		WHERE Product.category_id = 2
		AND Image.is_main = 1
        AND ((ptc.discount_price IS NOT NULL AND ptc.discount_price >= :price_from) OR (ptc.discount_price IS NULL AND ptc.price >= :price_from))
        AND ((ptc.discount_price IS NOT NULL AND ptc.discount_price <= :price_to) OR (ptc.discount_price IS NULL AND ptc.price <= :price_to))
        GROUP BY Image.name
	');
	$sth->bindParam(':price_from', $price_from, PDO::PARAM_INT);
	$sth->bindParam(':price_to', $price_to, PDO::PARAM_INT);
	$sth->execute();
	$products = $sth;
	return $products->fetchAll();
}


?>
