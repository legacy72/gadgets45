<?
require_once('../db/queries.php');

if(isset($_POST)) {
    $customerData = $_POST;
	$cartData = json_decode($_POST['cartData'], true);

    $res = insertIntoOrder($dbh, $customerData, $cartData);
    if($res === True){
    	echo('Ваш заказ успешно оформлен');
    }
    else{
    	echo('Что-то пошло не так');
    }
}