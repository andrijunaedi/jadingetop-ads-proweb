<?php
$title = "Detail";
$active = "device";

include_once(dirname(__DIR__) . '/components/Layout/header.php');
require_once(dirname(__DIR__) . '/models/Device.php');

$id = $_GET['id'];

if ($id) {
    $Device = new Device($userId);
    $device = $Device->getById($id);

    if ($device == NULL) {
        header('Location: /device/index.php');
        exit;
    }
} else {
    header('Location: /device/index.php');
}

?>

<main class="pt-4 pb-20 px-14">
    <div class="mx-auto max-w-2xl py-10 sm:py-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-4">
        <!-- Product details -->
        <div class="">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><?= $device['nama'] ?></h1>
            </div>

            <section aria-labelledby="information-heading" class="mt-4">
                <h2 id="information-heading" class="sr-only">Product information</h2>

                <div class="mt-6 flex items-center gap-x-5">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                        <p class="ml-2 text-sm text-gray-500"><?= ucwords($device['orientasi']) ?></p>
                    </div>
                </div>
            </section>

            <section class="mt-10" aria-labelledby="options-heading">
                <h2 id="options-heading" class="sr-only">Product options</h2>
                <div class="sm:flex sm:justify-between">
                    <!-- Size selector -->
                    <fieldset>
                        <legend class="block text-sm font-medium text-gray-700">Lokasi</legend>
                        <p><?= $device['lokasi'] ?></p>
                    </fieldset>
                </div>
            </section>
            <section class="mt-10 flex gap-x-4">
                <a href="#" class="inline-flex items-center justify-center rounded-md border border-transparent bg-orange-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-orange-300 focus:outline-none focus:ring-2 focus:bg-orange-300  focus:ring-offset-2 sm:w-auto">Edit Perangkat</a>
                <a href="#" class="inline-flex items-center rounded border border-transparent bg-red-100 px-2.5 py-2 text-xs font-medium text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Hapus Perangkat</a>
            </section>
        </div>

        <!-- Product image -->
        <div class="mt-10 lg:col-start-2 lg:row-span-2 lg:mt-0 lg:self-center">

        </div>
    </div>

</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php') ?>