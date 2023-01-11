<?php
include_once(dirname(__DIR__) . '/helper/auth.php');
validateUserSession();
$userId = $_SESSION['user']['id'];

require_once(dirname(__DIR__) . '/models/Billings.php');

# Add new topup
if (isset($_POST['submit'])) {
    $nominal = $_POST['nominal'];

    $Billing = new Billings($userId);
    $result = $Billing->topup($nominal);

    if ($result['status']) {
        header("Location: /billing/detail.php?id={$result['id']}");
    } else {
        header("Location: /billing/?message={$result['message']}");
    }
}
