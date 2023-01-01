<?php
$title = "Billing";
include_once(dirname(__DIR__) . '/components/Layout/header.php');
require_once(dirname(__DIR__) . '/models/Billings.php');

$Billing = new Billings();
$histories = $Billing->getAll();
// var_dump($histories);
?>

<main class="pt-12 pb-20 px-14">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-semibold">Riwayat transaksi</h1>
    </div>
    <div class="my-8">
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Sukses</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-green-500">71,897</dd>
            </div>

            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Tertunda</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-orange-400">58.16%</dd>
            </div>

            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Batal</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-red-500">24.57%</dd>
            </div>
        </dl>
    </div>
</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php') ?>