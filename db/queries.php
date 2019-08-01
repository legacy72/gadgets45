<?
require_once 'connection.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/templates/functions.php';

// получаем id категории по названию
function getCategoryID(PDO $dbh, $category_name){
	$sth = $dbh->prepare('
		SELECT id FROM Category WHERE name = :category_name
	');
	$sth->bindParam(':category_name', $category_name, PDO::PARAM_STR);
	$sth->execute();
	$categoryID = $sth->fetch();
	return $categoryID['id'];
} 


// получаем все виды характеристик смартфонов
function getSpecifications(PDO $dbh, $category_id){
	$sth = $dbh->prepare('
		SELECT DISTINCT specification_id, value FROM ProductToSpecification
		JOIN Specification ON Specification.id = ProductToSpecification.specification_id
		WHERE Specification.category_id = :category_id
		ORDER BY CAST(value AS UNSIGNED), value
	');
	$sth->bindParam(':category_id', $category_id, PDO::PARAM_INT);
	$sth->execute();
	$specifications = $sth;
	return $specifications->fetchAll(PDO::FETCH_ASSOC);
}

// Название цвета в id
function getColorID(PDO $dbh, $color_name){
	$sth = $dbh->prepare('
		SELECT Color.id FROM Color WHERE Color.name = :color_name
	');
	$sth->bindParam(':color_name', $color_name, PDO::PARAM_STR);
	$sth->execute();
	$colorID = $sth->fetch();
	return $colorID['id'];
}

// Получаем харатеристики конкретного продутка
function getProductSpecifictions(PDO $dbh, $product_url_name){
	$sth = $dbh->prepare('
		SELECT 
			T.product_name,
			T.specification_name, 
			T.specification_name_ru,
		    T.specifiaction_group,
		    T.specification_value
		FROM
		(
		    SELECT
		    	Product.name AS product_name,
		    	Specification.name AS specification_name,
		    	Specification.name_ru AS specification_name_ru,
		    	Specification.specifiaction_group,
		    	pts.value AS specification_value
		    FROM Product
		    JOIN ProductToSpecification pts ON pts.product_id = Product.id
		    JOIN Specification ON Specification.id = pts.specification_id
		    WHERE
		    Product.url_name = :product_url_name
		) T
	');
	$sth->bindParam(':product_url_name', $product_url_name, PDO::PARAM_STR);
	$sth->execute();
	$productSpecificatios = $sth->fetchAll(PDO::FETCH_ASSOC);
	return $productSpecificatios;
}


// Получаем основную информацию о продукте
function getProductMainInfo(PDO $dbh, $product_url_name, $color_id){
	$sth = $dbh->prepare('
		SELECT 
			Product.id,
			Product.name,
			Product.description_title,
			Product.description_text,
		    ptc.id AS ptc_id,
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

// Список всех продуктов, подходящих под фильтры
function getProducts(PDO $dbh, $filterSpecs, $category_id, $price_from, $price_to, $order_by, $limit, $offset = 0){
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
                ptc.id AS ptc_id,
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
	        WHERE Product.category_id = :category_id
			AND Image.is_main = true
	        AND ptc.discount_price BETWEEN :price_from AND :price_to
	    ) T
	';

	// дополнительная строка фильтрации
	$sql .= getAdditionaStringForlQuery($filterSpecs, $order_by, $limit, $offset);
	
	$sth = $dbh->prepare($sql);

	$sth->bindParam(':category_id', $category_id, PDO::PARAM_INT);
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

// Получение хитов продаж
function getBestSellersOrStocks(PDO $dbh, $typeSelect){
	// typeSelect (string) - тип продуктов для выбора 
	// Варианты: 1) bestseller - хит продаж
	//			 2) stock - наши акции
	$sql = ('
        SELECT 
            img.name AS image_name, 
            p.name, 
            p.url_name AS url_name,
            Color.name AS color_name,
            ptc.price,
            ptc.discount_price,
            Category.name AS category_name
		FROM Image img
			JOIN Color ON Color.id = img.color_id
			JOIN Product p ON p.id = img.product_id
		    JOIN ProductToColor ptc ON ptc.product_id = p.id AND ptc.color_id = Color.id
			JOIN Category ON p.category_id = Category.id
		WHERE img.is_main = true
		AND 
	');
	if($typeSelect === 'bestseller')
		$type = ' ptc.is_bestseller = true';
	else if($typeSelect === 'stock')
		$type = ' ptc.is_stock = true';
	$query = "{$sql}{$type}";

	$sth = $dbh->prepare($query);
	$sth->execute();
	$prods = $sth->fetchAll(PDO::FETCH_ASSOC);

	return $prods;
}


// Заполнение информации (данные корзины) о заказе
function insertIntoOrderProducts(PDO $dbh, $cartData, $orderID){
	// удаляем лишние поля и добавляем поле айди заказа
	for($i = 0; $i < count($cartData); $i++){	
		unset($cartData[$i]['product_name']);
		unset($cartData[$i]['product_image']);
		unset($cartData[$i]['product_price']);
		unset($cartData[$i]['product_reference']);
		$cartData[$i]['order_id'] = $orderID;
	}

	$res = pdoMultiInsert($dbh, 'OrdersProducts', $cartData);
	return $res;
}

// Заполнение информации о заказчике
function insertIntoOrder(PDO $dbh, $customerData, $cartData){
	$orderInfo = [
    	'name' => $customerData['name'],
		'street' => $customerData['street'],
		'home_number' => $customerData['home_number'],
		'entrance' => $customerData['entrance'],
		'apartment' => $customerData['apartment'],
		'phone' => $customerData['phone'],
		'email' => $customerData['email'],
		'comment' => $customerData['comment'],
		'payment_type' => $customerData['payment_type']
	];

	$query = '
		INSERT INTO `Order` 
		(
			customer_name, customer_street, customer_home_number,
			customer_entrance, customer_apartment, customer_phone,
			customer_email, customer_comment, payment_type
		)
		VALUES
		(
			:name, :street, :home_number, :entrance, :apartment,
			:phone, :email, :comment, :payment_type
		)
	';
	$sth = $dbh->prepare($query);
	$resCustomer = $sth->execute($orderInfo);
	if($resCustomer === True)
		$res = insertIntoOrderProducts($dbh, $cartData, $dbh->lastInsertId());
	return $res;
}

// Выборка смартфонов
function getProductItems(PDO $dbh, $filterSpecs = array(), $category_id = 1, $price_from = 0, $price_to = 999999, $order_by = 1, $limit = True, $offset = 0){
	$products = getProducts($dbh, $filterSpecs, $category_id, $price_from, $price_to, $order_by, $limit, $offset);
	return $products->fetchAll(PDO::FETCH_ASSOC);
}
// Количество продуктов, подходящих под фильтр
function getCountProducts(PDO $dbh, $filterSpecs = array(), $category_id = 1, $price_from = 0, $price_to = 999999, $order_by = 1, $limit = False, $offset = 0){
	$products = getProducts($dbh, $filterSpecs, $category_id, $price_from, $price_to, $order_by, $limit, $offset);
	return count($products->fetchAll(PDO::FETCH_ASSOC));
}

// Получение цветов продукта
function getProductColors($dbh, $product_id){
	$sth = $dbh->prepare('
		SELECT Color.name FROM ProductToColor
		JOIN Color ON Color.id = ProductToColor.color_id
		WHERE ProductToColor.product_id = :product_id
	');
	$sth->bindParam(':product_id', $product_id, PDO::PARAM_INT);
	$sth->execute();
	$colors = $sth->fetchAll(PDO::FETCH_ASSOC);
	return $colors;
}

function getSearchedProducts($dbh){
	$sth = $dbh->prepare('
		SELECT 
			p.url_name, 
			p.name, 
			p.category_id, 
			clr.name AS color_name, 
			cat.name AS category_name 
		FROM Product AS p
		JOIN ProductToColor AS ptc ON p.id = ptc.product_id
		JOIN Category AS cat ON p.category_id = cat.id
		JOIN Color AS clr ON ptc.color_id = clr.id
	');
	$sth->execute();
	return $sth->fetchAll(PDO::FETCH_ASSOC);
}

?>
