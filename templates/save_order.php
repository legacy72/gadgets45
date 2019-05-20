<?
require_once('../db/queries.php');
require_once('functions.php');
?>


<?
if(isset($_POST)) {
    $customerData = $_POST;
	$cartData = json_decode($_POST['cartData'], true);

    $res = insertIntoOrder($dbh, $customerData, $cartData);
    if($res === TRUE){
        echo('Ваш заказ успешно оформлен');
    }
    else{
    	echo('Что-то пошло не так');
    }
}