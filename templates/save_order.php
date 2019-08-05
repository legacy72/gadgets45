<?
use PHPMailer\PHPMailer\PHPMailer;

require_once '../db/queries.php';
require_once 'functions.php';
require_once '../php_mailer/PHPMailer.php';
require_once '../php_mailer/SMTP.php';
?>

<?
// Информация о заказе
function getOrderInfo($customerData, $cartData){
    $info = "<b>Пользователь сделал заказ. Информация о заказчике:</b>";
    $info .= "<br>Имя: ". $customerData['name'];
    $info .= "<br>Телефон: ". $customerData['phone'];
    $info .= "<br>Почта: ". $customerData['email'];
    $info .= "<br>Комментарий: ". $customerData['comment'];
    $info .= "<br>Улица: ". $customerData['street'];
    $info .= "<br>Номер дома: ". $customerData['home_number'];
    $info .= "<br>Подъезд: ". $customerData['entrance'];
    $info .= "<br>Комната: ". $customerData['apartment'];
    $info .= "<br>Способ оплаты: ". $customerData['payment_type'];

    $info .= "<br><br><b>Информация о заказе:</b>";
    foreach($cartData AS $product){
        $info .= "<br>Ссылка на заказанный продукт: ". DOMEN_NAME. $product['product_reference']; 
        $info .= "<br>Айдишник продукта: ". $product['ptc_id'];
        $info .= "<br>Название продукта: ". $product['product_name'];
        $info .= "<br>Цена продукта: ". $product['product_price'];
        $info .= "<br>Количество продукта: ". $product['product_quantity'] ."<br>";
    }
    return $info;
}
// отправка сообщения о заказе покупателю
function sendEmailAboutOrderForCustomer($customerData, $cartData){
    if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        $email = clearText($customerData['email']);
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host       = "smtp.gmail.com"; 
        $mail->SMTPDebug  = 0; 
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "ssl";
        $mail->Port       = 465;
        $mail->Priority    = 3;
        $mail->CharSet     = 'UTF-8';
        $mail->Encoding    = '8bit';
        $mail->Subject     = "Тестовый заказ в магазине gadgets45";
        $mail->ContentType = "text/html; charset=utf-8\r\n";
        $mail->SetFrom(EMAIL_FOR_PHPMAILER);
        $mail->Username   = EMAIL_FOR_PHPMAILER;
        $mail->Password   = "skyline45";
        $mail->isHTML(true); 
        $mail->Body = "Вы сделали заказ в магазине gadgets45, подробности добавим чуть позже (:";
        $mail->WordWrap = 50;
        $mail->AddAddress($email);
        if(!$mail->send()) {
            echo 'Ваше сообщение не отправлено';
            return null;
        }
        else{
            echo 'Ваше сообщение отправлено';
            return $mail;
        }
    }
}
// отправка сообщения о заказе администратору
function sendEmailAboutOrderForAdmin($customerData, $cartData, $mail){
    $mail->ClearAllRecipients();
    $mail->Body = getOrderInfo($customerData, $cartData);
    foreach(ADMIN_EMAILS AS $adminEmail){
        $mail->AddCC($adminEmail);   
    }
    $mail->Send();
}
// отправка сообщений о заказе
function sendEmailAboutOrder($customerData, $cartData){
    $mail = sendEmailAboutOrderForCustomer($customerData, $cartData);
    if(!is_null($mail))
        sendEmailAboutOrderForAdmin($customerData, $cartData, $mail);
}
?>


<?
if(isset($_POST)) {
    $customerData = $_POST;
    $cartData = json_decode($_POST['cartData'], true);
    $res = insertIntoOrder($dbh, $customerData, $cartData);
    if($res === TRUE){
        sendEmailAboutOrder($customerData, $cartData); 
    }
    else{
    	echo('Что-то пошло не так');
    }
}