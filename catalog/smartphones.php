<?
include '../templates/catalog_start.php';
$productItems = getProductItems($dbh, 1);
$specifications = getSpecifications($dbh);

echo 'Смартфоны';
include '../templates/catalog_end.php';
include '../templates//close_connection.php';