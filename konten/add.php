<?php
require_once(dirname(__DIR__) . '/models/Konten.php');

# Add new data Konten
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $thumbnail = $_POST['thumbnail'];
    $orientasi = $_POST['orientasi'];
    $durasi = $_POST['durasi'];
    $devices = $_POST['devices'];

    $Konten = new Konten();
    $result = $Konten->insert($judul, $konten, $thumbnail, $orientasi, $durasi, $devices);

    if ($result['status']) {
        header('Location: /konten/index.php');
    } else {
        echo $result['message'];
    }
}
