<?php
ob_start();
$title = "Perangkat | Jadingetop Ads";
$active = "device";

include_once(dirname(__DIR__) . '/components/Layout/header.php');
include_once(dirname(__DIR__) . '/helper/auth.php');
include_once(dirname(__DIR__) . '/models/Device.php');
validateUserSessionRoleMitra();

$Device = new Device($userId);
$devices = $Device->getAllByUser();
?>

<main class="pt-12 pb-20 px-14">
    <div class="flex items-center justify-between">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-semibold">Perangkat</h1>
            <p class="mt-2 text-sm text-gray-700">Daftar semua perangkat Anda</p>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="/device/tambah.php" class="inline-flex items-center justify-center rounded-md border border-transparent bg-[#2B7FFF] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#6BA6FF] focus:outline-none focus:ring-2 focus:bg-[#6BA6FF]  focus:ring-offset-2 sm:w-auto">Tambah Perangkat</a>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-5">
        <?php if (is_array($devices)) : ?>
            <?php foreach ($devices as $device) : ?>
                <a href="/device/detail.php?id=<?= $device['id'] ?>">
                    <div class="relative block cursor-pointer rounded-lg border border-gray-300 p-4 focus:outline-none hover:bg-blue-100">
                        <p id="size-choice-0-label" class="text-xl font-medium text-gray-900"><?= $device['nama'] ?></p>
                        <div class="flex items-center my-3">
                            <span class="<?= $device['orientasi'] == 'landscape' ? 'rotate-90' : '' ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5h3m-6.75 2.25h10.5a2.25 2.25 0 002.25-2.25v-15a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 4.5v15a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </span>
                            <p class="ml-2 text-sm text-gray-500"><?= ucwords($device['orientasi']) ?></p>
                        </div>
                        <p id="size-choice-0-description" class="mt-1 text-sm text-gray-500">Lokasi: <?= $device['lokasi'] ?></p>
                        <div class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="text-center">
                <p class="text-gray-500">Belum ada perangkat</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php'); ?>