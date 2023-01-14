<?php
include_once(dirname(__DIR__) . '/helper/auth.php');
require_once(dirname(__DIR__) . '/models/Device.php');
validateUserSession();
$userId = $_SESSION['user']['id'];

# Update konten by id
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $lokasi = $_POST['lokasi'];
    $orientasi = $_POST['orientasi'];

    $Device = new Device($userId);
    $result = $Device->update($id, $nama, $lokasi, $orientasi);

    if ($result['status']) {
        header('Location: /device/index.php');
    } else {
        echo $result['message'];
    }
}
