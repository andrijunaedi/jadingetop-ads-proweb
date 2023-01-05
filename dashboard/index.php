<?php
$title = "Beranda | Jadingetop Ads";
$active = "dashboard";
include_once(dirname(__DIR__) . '/components/Layout/header.php');
?>

<main class="pt-12 pb-20 px-14">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-semibold">Selamat Datang <?= $username ?></h1>
    </div>
    <div class="my-8">
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Saldo saat ini</dt>
                <dd class="mt-1 text-2xl font-semibold tracking-tight">Rp <?= number_format($currentBalance) ?></dd>
            </div>
        </dl>
    </div>

</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php'); ?>