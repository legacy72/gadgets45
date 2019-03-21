<?
require_once 'connection.php';
require_once '../templates/functions.php';

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
	return $specifications->fetchAll();
}

function getSmartphones(PDO $dbh, $filterSpecs, $filterStringParams, $price_from = 0, $price_to = 999999, $order_by = 1){
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
	';

	// дополнительная строка фильтрации
	$sql .= getAdditionaStringForlQuery($filterSpecs, $filterStringParams, $order_by);

	$sth = $dbh->prepare($sql);
	$sth->bindParam(':price_from', $price_from, PDO::PARAM_INT);
	$sth->bindParam(':price_to', $price_to, PDO::PARAM_INT);

	// генерируем параметры для WHERE pts.value IN 
	$bindParams = generateBindParams($filterSpecs);

	$sth = bindDynamicParams($dbh, $sth, $bindParams);

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
