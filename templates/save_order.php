<?
require_once('../db/queries.php');
require_once('functions.php');
?>

<?
function sendEmail($email_to){
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "test@gadgets45";
    $subject = "Заказ в магазине gadgets45";
    $message = "Вы сделали заказ в магазине gadgets45, подробности добавим чуть позже (:";
    $headers = "From:" . $from;
    mail($email_to, $subject, $message, $headers);
    echo('Ваш заказ успешно оформлен, проверьте почту.');
}
?>
<?
if(isset($_POST)) {
    $customerData = $_POST;
    $cartData = json_decode($_POST['cartData'], true);
    $res = insertIntoOrder($dbh, $customerData, $cartData);
    if($res === TRUE){
        sendEmail($customerData['email']); 
    }
    else{
    	echo('Что-то пошло не так');
    }
}