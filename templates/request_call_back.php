<?
use PHPMailer\PHPMailer\PHPMailer;

require_once '../db/queries.php';
require_once 'functions.php';
require_once '../php_mailer/PHPMailer.php';
require_once '../php_mailer/SMTP.php';
?>

<?
// Информация о заказчике, заказавшем обратный звонок
function getCustomerInfo($customerData){
    $info = "<b>Пользователь заказал обратный звонок. Информация о заказчике:</b>";
    $info .= "<br>Имя: ". $customerData['name'];
    $info .= "<br>Телефон: ". $customerData['phone'];
    $info .= "<br>Почта: ". $customerData['email'];
    $info .= "<br>Комментарий: ". $customerData['comment'];

    return $info;
}
// отправка админу уведомления о заказе обратного звонка
function sendEmailForAdminAboutCallBack($customerData){
    if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
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
        $mail->Subject     = "Заказ обратного звонка в магазине gadgets45";
        $mail->ContentType = "text/html; charset=utf-8\r\n";
        $mail->SetFrom(EMAIL_FOR_PHPMAILER);
        $mail->Username   = EMAIL_FOR_PHPMAILER;
        $mail->Password   = "skyline45";
        $mail->isHTML(true); 
        $mail->Body = getCustomerInfo($customerData);
        $mail->WordWrap = 50;
        foreach(ADMIN_EMAILS AS $adminEmail){
            $mail->AddCC($adminEmail);
        }
        if(!$mail->send()) {
            echo 'Извините, что-то пошло не так.';
        }
        else{
            echo 'Спасибо, что заказали звонок. Ожидайте, в ближайшее время с вами свяжутся.';
        }
    }
}
?>

<?
if(isset($_POST)) {
    sendEmailForAdminAboutCallBack($_POST); 
}