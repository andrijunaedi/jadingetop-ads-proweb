<?php
require_once(dirname(__DIR__) . '/models/Billings.php');

$apiKey = 'JadingetopAds23!';

if ($_SERVER['HTTP_X_API_KEY'] == $apiKey && isset($_POST['id'])) {
    $Billing = new Billings();

    $result = $Billing->confirmPayment($_POST['id']);
    return $result;
} else {
    return 'Invalid API Key';
}
