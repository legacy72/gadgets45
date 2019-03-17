<?
include '../templates/catalog_start.php';
$productItems = getProductItems($dbh, 3);
echo 'Аксессуары';
include '../templates/catalog_end.php';
include '../templates//close_connection.php';