<?php
require_once(dirname(__DIR__) . '/models/Konten.php');

# delete konten by id
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $Konten = new Konten();
    $result = $Konten->delete($id);

    if ($result['status']) {
        header('Location: /konten/index.php');
    } else {
        echo $result['message'];
    }
}
