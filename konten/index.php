<?php
$title = "Konten | Jadingetop Ads";
$active = "konten";

include_once(dirname(__DIR__) . '/components/Layout/header.php');
require_once(dirname(__DIR__) . '/models/Konten.php');

$Konten = new Konten($userId);
$contents = $Konten->getAllWithDevices();
?>

<main class="pt-12 pb-20 px-14">
    <div class="px-4 sm:px-6 lg:px-4">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-semibold">Konten</h1>
                <p class="mt-2 text-sm text-gray-700">Daftar semua konten</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <a href="/konten/tambah.php" class="inline-flex items-center justify-center rounded-md border border-transparent bg-[#2B7FFF] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#6BA6FF] focus:outline-none focus:ring-2 focus:bg-[#6BA6FF]  focus:ring-offset-2 sm:w-auto">Tambah Konten</a>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg" x-data="{ 'showModal': false, 'contentId': 0 }" @keydown.escape="showModal = false">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">Konten</th>
                                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Judul</th>
                                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Orientasi</th>
                                    <th scope="col" class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">Devices</th>
                                    <th scope="col" class="relative py-3 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <?php if (is_array($contents)) : ?>
                                    <?php foreach ($contents as $content) : ?>
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                <div class="h-10 w-10 flex-shrink-0">
                                                    <img class="h-10 w-10 rounded-full" src="<?= $content['thumbnail'] ?>" alt="<?= $content['judul'] ?>">
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <a class="hover:text-blue-700" href="/konten/detail.php?id=<?= $content['id'] ?>">
                                                    <?= $content['judul'] ?>
                                                </a>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= ucwords($content['orientasi']) ?></td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 truncate"><?= implode(", ", $content['devices']) ?></td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-3">
                                                <a href="/konten/edit.php?id=<?= $content['id'] ?>" class="text-indigo-600 hover:text-indigo-900">Edit <span class="sr-only">, <?= $content['judul'] ?></span></a>
                                                <button @click="showModal = true, contentId = <?= $content['id'] ?>" type="button" class="text-red-600 hover:text-red-900">Hapus<span class="sr-only">, <?= $content['judul'] ?></span></button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="5" class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            <div class="text-center">
                                                <p class="text-gray-500">Belum ada konten</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

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
                                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Hapus konten</h3>
                                                <div class="mt-2">
                                                    <p class="text-sm text-gray-500">Apakah Anda yakin menghapus konten ini?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                            <form action="/konten/delete.php" method="post">
                                                <input type="hidden" name="id" x-model="contentId">
                                                <button @click="showModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:w-auto sm:text-sm">Batal</button>
                                                <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php') ?>