<?php
$title = "Edit Perangkat | Jadingetop Ads";
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

<main class="pt-12 pb-20 px-14">
    <div class="px-4 sm:px-6 lg:px-4">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-semibold">Edit Perangkat</h1>
                <p class="mt-2 text-sm text-gray-700">Edit Perangkat Anda</p>
            </div>
        </div>
        <form class="space-y-8 divide-y divide-gray-200" method="POST" action="/device/update.php">
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <input type="hidden" name="id" value="<?= $device['id'] ?>">
                        <div class="sm:col-span-3">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="nama" id="nama" autocomplete="nama" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= $device['nama'] ?>" required>
                            </div>
                        </div>

                        <div class="sm:col-span-5">
                            <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="lokasi" id="lokasi" autocomplete="lokasi" placeholder="Masukan lokasi perangkat.." class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?= $device['lokasi'] ?>" required>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <fieldset>
                                <legend class="contents text-base font-medium text-gray-900">Orientasi</legend>
                                <p class="text-sm text-gray-500">Jenis orientasi perangkat akan menentukan Iklan yang dapat muncul</p>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-center">
                                        <input id="portrait" name="orientasi" value="portrait" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" <?= $device['orientasi'] == 'portrait' ? 'checked' : '' ?> required>
                                        <label for="portrait" class="ml-3 block text-sm font-medium text-gray-700">Portrait</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="landscape" name="orientasi" value="landscape" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" <?= $device['orientasi'] == 'landscape' ? 'checked' : '' ?>>
                                        <label for="landscape" class="ml-3 block text-sm font-medium text-gray-700">Landscape</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>

            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <a href="/device/detail.php?id=<?= $id ?>" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Batalkan</a>
                    <button type="submit" name="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Simpan</button>
                </div>
            </div>
        </form>

    </div>

</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php') ?>