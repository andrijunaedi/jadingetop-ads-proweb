<?php
include_once(dirname(__DIR__) . '/helper/auth.php');
validateUserSession();
$userId = $_SESSION['user']['id'];

require_once(dirname(__DIR__) . '/models/Billings.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $Billings = new Billings($userId);

    $result = $Billings->cancelPayment($id);

    if ($result['status']) {
        header('Location: /billing/index.php');
    } else {
        echo $result['message'];
    }
}
