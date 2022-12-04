<?php
// Memanggil model konten 
require_once(dirname(__DIR__) . '/models/Konten.php');

# delete konten by id

// Check apakah ada id di request method POST
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Menggunakan models Konten
    $Konten = new Konten();

    // Menghapus konten
    $result = $Konten->delete($id);

    // Check apakah berhasil menghapus konten
    if ($result['status']) {
        header('Location: /konten/index.php');
    } else {
        echo $result['message'];
    }
}
