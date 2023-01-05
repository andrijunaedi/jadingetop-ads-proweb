<?php
ob_start();
$title = "Perangkat | Jadingetop Ads";
$active = "device";

include_once(dirname(__DIR__) . '/components/Layout/header.php');
include_once(dirname(__DIR__) . '/helper/auth.php');
validateUserSessionRoleMitra();
?>

<main class="pt-12 pb-20 px-14">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-semibold">Perangkat</h1>
    </div>
</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php'); ?>