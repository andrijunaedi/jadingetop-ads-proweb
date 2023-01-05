<?php
$title = "Tambah Konten | Jadingetop Ads";
$active = "konten";

include_once(dirname(__DIR__) . '/components/Layout/header.php');
require_once(dirname(__DIR__) . '/models/Device.php');

$Device = new Device();
$devices = $Device->getAll();
?>

<main class="pt-12 pb-20 px-14">
    <div class="px-4 sm:px-6 lg:px-4">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-semibold">Tambah Konten</h1>
                <p class="mt-2 text-sm text-gray-700">Tambahkan konten baru yang akan kamu iklankan</p>
            </div>
        </div>
        <form class="space-y-8 divide-y divide-gray-200" method="POST" action="/konten/add.php">
            <div class="space-y-8 divide-y divide-gray-200">
                <div>
                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="judul" id="judul" autocomplete="judul" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            </div>
                        </div>

                        <div class="sm:col-span-5">
                            <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="konten" id="konten" autocomplete="konten" placeholder="Masukan URL Konten" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            </div>
                        </div>

                        <div class="sm:col-span-5">
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="thumbnail" id="thumbnail" autocomplete="thumbnail" placeholder="Masukan URL Thumbnail" class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <fieldset>
                                <legend class="contents text-base font-medium text-gray-900">Orientasi</legend>
                                <p class="text-sm text-gray-500">Jenis orientasi konten akan menentukan TV yang dapat dipilih</p>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-center">
                                        <input id="portrait" name="orientasi" value="portrait" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" required>
                                        <label for="portrait" class="ml-3 block text-sm font-medium text-gray-700">Portrait</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="landscape" name="orientasi" value="landscape" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label for="landscape" class="ml-3 block text-sm font-medium text-gray-700">Landscape</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="durasi" class="block text-sm font-medium text-gray-700">Durasi Transisi</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="number" name="durasi" id="durasi" autocomplete="durasi" placeholder="Satuan detik" required class="block w-full min-w-0 flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <div>
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Device</h3>
                                <p class="mt-1 text-sm text-gray-500">Device/TV adalah perangkat yang akan menampilkan konten iklan</p>
                            </div>
                            <div class="mt-6">
                                <fieldset>
                                    <legend class="sr-only">Pilih Device</legend>
                                    <div class="text-base font-medium text-gray-900" aria-hidden="true">Pilih Device</div>
                                    <div class="mt-4 space-y-4">
                                        <?php if (is_array($devices)) : ?>
                                            <?php foreach ((array) $devices as $device) : ?>
                                                <div class="relative flex items-start">
                                                    <div class="flex h-5 items-center">
                                                        <input id="<?= $device["slug"] ?>" name="devices[]" value="<?= $device["id"] ?>" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                    </div>
                                                    <div class="ml-3 text-sm">
                                                        <label for="<?= $device["slug"] ?>" class="font-medium text-gray-700"><?= $device["nama"] ?></label>
                                                        <p class="text-gray-500"><?= $device["lokasi"] ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <div><?= $devices ?></div>
                                        <?php endif; ?>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <a href="/konten/index.php" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Batalkan</a>
                    <button type="submit" name="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Simpan</button>
                </div>
            </div>
        </form>

    </div>

</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php') ?>