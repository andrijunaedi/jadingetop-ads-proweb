<?php
$title = "Detail";
include_once(dirname(__DIR__) . '/components/Layout/header.php');
require_once(dirname(__DIR__) . '/models/Konten.php');
require_once(dirname(__DIR__) . '/models/Device.php');

$id = $_GET['id'];

if ($id) {
    $Konten = new Konten();
    $Device = new Device();

    $content = $Konten->getById($id);
    $devices = $Device->getAll();
    $devices_selected = $Konten->getDevicesById($id);

    var_dump('Konten Detail', $content); 
    var_dump('Semua Devices', $devices);
    var_dump('Devices Selected', $devices_selected);

    if ($content == NULL) {
        header('Location: /konten/index.php');
        exit;
    }

    $Konten->close();
} else {
    // header('Location: /konten/index.php');
}

?>

<main class="pt-12 pb-20 px-14">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-semibold">Detail Konten</h1>
    </div class>
    <?php echo $content['judul'] ?>
    <?= $content['orientasi'] ?>

<!-- regina cantik -->
</main class>
<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php') ?>