<?
require_once 'connection.php';

function getSpecifications(PDO $dbh){
	$sth = $dbh->prepare('
		SELECT specification_id, value FROM ProductToSpecification
		JOIN Specification ON Specification.id = ProductToSpecification.specification_id
		WHERE Specification.category_id = 1
	');
	$sth->execute();
	$specifications = $sth;
	return $specifications->fetchAll();
}

function getProductItems(PDO $dbh, $category_id, $price_from = 1, $price_to = 999999, $number_of_cores = [4, 8, 16]){
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
		WHERE Image.is_main = 1
		AND Product.category_id = :category_id
        AND ((ptc.discount_price IS NOT NULL AND ptc.discount_price >= :price_from) OR (ptc.discount_price IS NULL AND ptc.price >= :price_from))
        AND ((ptc.discount_price IS NOT NULL AND ptc.discount_price <= :price_to) OR (ptc.discount_price IS NULL AND ptc.price <= :price_to))
        -- AND (pts.specification_id = 8 AND (pts.value = :number_of_cores_0 OR pts.value = :number_of_cores_1 OR pts.value = :number_of_cores_2))
        GROUP BY Image.name
	');
	$sth->bindParam(':category_id', $category_id, PDO::PARAM_INT);
	$sth->bindParam(':price_from', $price_from, PDO::PARAM_INT);
	$sth->bindParam(':price_to', $price_to, PDO::PARAM_INT);
	// $sth->bindParam('number_of_cores_0', $number_of_cores[0], PDO::PARAM_INT);
	// $sth->bindParam('number_of_cores_1', $number_of_cores[1], PDO::PARAM_INT);
	// $sth->bindParam('number_of_cores_2', $number_of_cores[2], PDO::PARAM_INT);
	$sth->execute();
	$products = $sth;
	return $products->fetchAll();
}
?>
