<?
require_once 'connection.php';

// получаем все виды характеристик смартфонов
function getSmartphonesSpecifications(PDO $dbh){
	$sth = $dbh->prepare('
		SELECT DISTINCT specification_id, value FROM ProductToSpecification
		JOIN Specification ON Specification.id = ProductToSpecification.specification_id
		WHERE Specification.category_id = 1
		-- ORDER BY value
	');
	$sth->execute();
	$specifications = $sth;
	return $specifications->fetchAll(PDO::FETCH_ASSOC);
}

//
function getColorID(PDO $dbh, $color_name){
	$sth = $dbh->prepare('
		SELECT Color.id FROM Color WHERE Color.name = :color_name
	');
	$sth->bindParam(':color_name', $color_name, PDO::PARAM_STR);
	$sth->execute();
	$colorID = $sth->fetch();
	return $colorID['id'];
}

//
function getProductSpecifictions(PDO $dbh){
	$sth = $dbh->prepare('
		SELECT 
			T.product_name, 
			T.specification_name, 
		    T.specifiaction_group,
		    T.specification_value
		FROM
		(
		    SELECT
		    	Product.name AS product_name,
		    	Specification.name AS specification_name,
		    	Specification.specifiaction_group,
		    	pts.value AS specification_value
		    FROM Product
		    JOIN ProductToSpecification pts ON pts.product_id = Product.id
		    JOIN Specification ON Specification.id = pts.specification_id
		    WHERE
		    Product.url_name = :product_name
		) T
	');
}


// Получаем основную информацию о продукте
function getProductMainInfo(PDO $dbh, $product_url_name, $color_id){
	$sth = $dbh->prepare('
		SELECT 
			Product.id,
			Product.name,
		    ptc.discount_price,
		    ptc.quantity
		FROM Product
		JOIN ProductToColor ptc ON ptc.product_id = Product.id AND ptc.color_id = :color_id
		WHERE Product.url_name = :product_url_name
	');
	$sth->bindParam(':product_url_name', $product_url_name, PDO::PARAM_STR);
	$sth->bindParam(':color_id', $color_id, PDO::PARAM_INT);
	$sth->execute();
	$productMainInfo = $sth->fetch(PDO::FETCH_ASSOC);
	return $productMainInfo;
}

// Получаем картинки продукта
function getProductImages(PDO $dbh, $product_id, $color_id){
	$sth = $dbh->prepare('
		SELECT name, is_main FROM Image 
		WHERE product_id = :product_id  
		AND color_id = :color_id
	');
	$sth->bindParam(':product_id', $product_id, PDO::PARAM_INT);
	$sth->bindParam(':color_id', $color_id, PDO::PARAM_INT);
	$sth->execute();
	$productImages = $sth->fetchAll(PDO::FETCH_ASSOC);
	return $productImages;
}


// Создание временной таблицы фильтров
function createTempTable(PDO $dbh, $filterSpecs){
	// Удаляем таблицу если есть
	$sth = $dbh->query('DROP TABLE IF EXISTS Filter');
	// Создаем временную таблицу фильтров
	$sth = $dbh->query('
		CREATE TEMPORARY TABLE Filter(specification_id INT, value VARCHAR(50))
	');
	// Считаем сколько элементов фильтра задействовано
	$filterLen = getCountOfDictItems($filterSpecs);
	// Заполняем таблицу выбранными фильтрами
	$query  = 'INSERT INTO Filter(specification_id, value) VALUES ';
	$qPart = array_fill(0, $filterLen, "(?, ?)");
	$query .=  implode(",",$qPart);
	$sth = $dbh->prepare($query); 
	$k = 1;
	foreach($filterSpecs as $filterKey => $filterValue){
		for($i = 0; $i < count($filterValue); $i++){
			$sth->bindValue($k++, $filterKey, PDO::PARAM_INT);
			$sth->bindValue($k++, $filterValue[$i], PDO::PARAM_STR);
		}
	}
	$sth->execute();
}

// Удаляем временную таблицу фильтров
function dropTempTable(PDO $dbh){
	$sth = $dbh->query('DROP TABLE Filter');
}


function getProducts(PDO $dbh, $filterSpecs, $price_from, $price_to, $order_by, $limit, $offset = 0){
	// создаем временную таблицу, если были выбраны какие-то фильтры
	if(!empty($filterSpecs))
		createTempTable($dbh, $filterSpecs);

	// считаем сколько различных фидов фильтров было использовано
	$countUsedFilters = count($filterSpecs); 

	$sql = '
		SELECT * FROM
	    (
	        SELECT 
                Image.name AS image_name, 
                Product.name AS product_name, 
                Product.url_name AS url_name,
                Color.name AS color_name,
                ptc.price,
                ptc.discount_price,
                ptc.quantity,
	        	pts.specification_id,
	            pts.value
			FROM Image
				JOIN Color ON Color.id = Image.color_id
				JOIN Product ON Product.id = Image.product_id
			    JOIN ProductToColor ptc ON ptc.product_id = Product.id AND ptc.color_id = Color.id
	            JOIN ProductToSpecification pts ON pts.product_id = Product.id
	        WHERE Product.category_id = 1
			AND Image.is_main = 1
	        AND ptc.discount_price BETWEEN :price_from AND :price_to
	    ) T
	';

	// дополнительная строка фильтрации
	$sql .= getAdditionaStringForlQuery($filterSpecs, $order_by, $limit, $offset);

	$sth = $dbh->prepare($sql);

	$sth->bindParam(':price_from', $price_from, PDO::PARAM_INT);
	$sth->bindParam(':price_to', $price_to, PDO::PARAM_INT);
	if(!empty($filterSpecs))
		$sth->bindParam(':count_filters', $countUsedFilters, PDO::PARAM_INT);
	$sth->execute();
	$products = $sth;

	// удаляем временную таблицу
	if(!empty($filterSpecs))
		dropTempTable($dbh);

	return $products;
}

// Выборка смартфонов
function getSmartphones(PDO $dbh, $filterSpecs = array(), $price_from = 0, $price_to = 999999, $order_by = 1, $limit = True, $offset = 0){
	$products = getProducts($dbh, $filterSpecs, $price_from, $price_to, $order_by, $limit, $offset);
	return $products->fetchAll(PDO::FETCH_ASSOC);
}

function getCountSmartphones(PDO $dbh, $filterSpecs = array(), $price_from = 0, $price_to = 999999, $order_by = 1, $limit = False, $offset = 0){
	$products = getProducts($dbh, $filterSpecs, $price_from, $price_to, $order_by, $limit, $offset);
	return count($products->fetchAll(PDO::FETCH_ASSOC));
}





function getNotebooks(PDO $dbh, $price_from = 1, $price_to = 999999){

}


?>
