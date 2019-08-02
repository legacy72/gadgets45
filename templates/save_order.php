<?
use PHPMailer\PHPMailer\PHPMailer;

require_once('../db/queries.php');
require_once('functions.php');
require_once('../php_mailer/PHPMailer.php');
require_once('../php_mailer/SMTP.php');
?>

<?
function sendEmail($email){
    if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
        $email = clearText($email);
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
        $mail->SetFrom("testkeklol123321@gmail.com");
        $mail->Username   = "testkeklol123321@gmail.com";
        $mail->Password   = "skyline45";
        $mail->isHTML(true); 
        $mail->Body = "Вы сделали заказ в магазине gadgets45, подробности добавим чуть позже (:";
        $mail->WordWrap = 50;
        $mail->AddAddress($email);
        if(!$mail->send()) {
          echo 'Ваше сообщение не отправлено';
          exit;
       }
       echo 'Ваше сообщение отправлено';
    }

    
    // ini_set('display_errors', 1);
    // error_reporting(E_ALL);
    // // $from = "test@gadgets45";
    // $from = "testkeklol123321@gmail.com";
    // $subject = "Заказ в магазине gadgets45";
    // $message = "Вы сделали заказ в магазине gadgets45, подробности добавим чуть позже (:";
    // $headers = "From:" . $from;
    // mail($email, $subject, $message, $headers);
    // echo('Ваш заказ успешно оформлен, проверьте почту.');
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