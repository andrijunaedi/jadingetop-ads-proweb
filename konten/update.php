<?php
include_once(dirname(__DIR__) . '/helper/auth.php');
require_once(dirname(__DIR__) . '/models/Konten.php');
validateUserSession();
$userId = $_SESSION['user']['id'];

# Update konten by id
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $thumbnail = $_POST['thumbnail'];
    $orientasi = $_POST['orientasi'];
    $durasi = $_POST['durasi'];

    $Konten = new Konten($userId);
    $result = $Konten->update($id, $judul, $konten, $thumbnail, $orientasi, $durasi);

    if ($result['status']) {
        header('Location: /konten/index.php');
    } else {
        echo $result['message'];
    }
}
