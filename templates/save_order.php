<?
use PHPMailer\PHPMailer\PHPMailer;
require_once 'config.php';
require_once '../db/queries.php';
require_once 'functions.php';
require_once '../php_mailer/PHPMailer.php';
require_once '../php_mailer/SMTP.php';
?>

<?

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

function sendEmail($customerData, $cartData){
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
        }
        else{
            echo 'Ваше сообщение отправлено';
        }

        foreach(ADMIN_EMAILS AS $adminEmail){
            $mail->ClearAllRecipients();
            $mail->Body = getOrderInfo($customerData, $cartData);
            $mail->AddAddress($adminEmail);
            $mail->Send();
        }
    }
}
?>
<?
if(isset($_POST)) {
    $customerData = $_POST;
    $cartData = json_decode($_POST['cartData'], true);
    $res = insertIntoOrder($dbh, $customerData, $cartData);
    if($res === TRUE){
        sendEmail($customerData, $cartData); 
    }
    else{
    	echo('Что-то пошло не так');
    }
}