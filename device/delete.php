<?php
include_once(dirname(__DIR__) . '/helper/auth.php');
validateUserSession();
$userId = $_SESSION['user']['id'];

require_once(dirname(__DIR__) . '/models/Device.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $Device = new Device($userId);

    $result = $Device->delete($id);

    if ($result['status']) {
        header('Location: /device/index.php');
    } else {
        echo $result['message'];
    }
}
