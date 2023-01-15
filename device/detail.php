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
    <div class="mx-auto max-w-2xl py-10 sm:py-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-4" x-data="{ 'showModal': false, 'deviceId': 0 }" @keydown.escape="showModal = false">
        <!-- Product details -->
        <div class="">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><?= $device['nama'] ?></h1>
            </div>

            <section aria-labelledby="information-heading" class="mt-4">
                <h2 id="information-heading" class="sr-only">Product information</h2>

                <div class="mt-6 flex items-center gap-x-5">
                    <div class="flex items-center">
                        <span class="<?= $device['orientasi'] == 'landscape' ? 'rotate-90' : '' ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5h3m-6.75 2.25h10.5a2.25 2.25 0 002.25-2.25v-15a2.25 2.25 0 00-2.25-2.25H6.75A2.25 2.25 0 004.5 4.5v15a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </span>
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
                <a href="/device/edit.php?id=<?= $device['id'] ?>" class="inline-flex items-center justify-center rounded-md border border-transparent bg-orange-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-orange-300 focus:outline-none focus:ring-2 focus:bg-orange-300  focus:ring-offset-2 sm:w-auto">Edit Perangkat</a>
                <button @click="showModal = true, deviceId = <?= $device['id'] ?>" type="button" class="inline-flex items-center rounded border border-transparent bg-red-100 px-2.5 py-2 text-xs font-medium text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Hapus Perangkat</button>
            </section>
        </div>

        <!-- Product image -->
        <div class="mt-10 lg:col-start-2 lg:row-span-2 lg:mt-0 lg:self-center">
        </div>

        <!-- Delete Perangkat -->
        <div x-show="showModal" x-init="() => { $el.classList.remove('hidden');$el.classList.add('block') }" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div @click.away="showModal = false" class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                        <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                            <button @click="showModal = false" type="button" class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Hapus Perangkat</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Apakah Anda yakin menghapus perangkat ini?</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                            <form action="/device/delete.php" method="post">
                                <input type="hidden" name="id" x-model="deviceId">
                                <button @click="showModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:w-auto sm:text-sm">Batal</button>
                                <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php') ?>