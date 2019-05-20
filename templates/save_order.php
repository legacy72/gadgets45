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
        $emailSended = sendEmail('hoperoina2016@gmail.com');
        if($emailSended === TRUE){
            echo('. На ваш email было выслано письмо, проверьте спам');
        }
        else{
            echo('. Письмо не было отправлено');
        }
    }
    else{
    	echo('Что-то пошло не так');
    }
}