<?
include '../templates/catalog_start.php';
$productItems = getProductItems($dbh, 2);
echo 'Ноутбуки';
include '../templates/catalog_end.php';
include '../templates//close_connection.php';