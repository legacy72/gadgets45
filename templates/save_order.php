<?
if(isset($_POST) && !empty($_POST['cartData'])) {
    $cartData = var_dump(json_decode($_POST['cartData']));
    print_r($cartData);
}