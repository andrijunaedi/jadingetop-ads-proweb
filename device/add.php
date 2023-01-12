<?php
include_once(dirname(__DIR__) . '/helper/auth.php');
validateUserSession();
$userId = $_SESSION['user']['id'];

require_once(dirname(__DIR__) . '/models/Device.php');

# Add new data Konten
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];
    $orientasi = $_POST['orientasi'];

    $Device = new Device($userId);
    $result = $Device->create($nama, $lokasi, $orientasi);

    if ($result['status']) {
        header('Location: /device/index.php');
    } else {
        echo $result['message'];
    }
}
