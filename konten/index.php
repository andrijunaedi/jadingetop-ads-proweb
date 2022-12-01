<?php
$title = "Konten";
include_once(dirname(__DIR__) . '/components/Layout/header.php');
require_once(dirname(__DIR__) . '/models/Konten.php');

$Konten = new Konten();
$contents = $Konten->getAll();
?>

<main class="pt-12 pb-20 px-14">
    <div class="px-4 sm:px-6 lg:px-4">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-semibold">Konten</h1>
                <p class="mt-2 text-sm text-gray-700">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae fugiat possimus sapiente, quidem magn</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <a href="/konten/tambah.php" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Tambah Konten</a>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
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
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= $content['judul'] ?></td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?= ucwords($content['orientasi']) ?></td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">WarmingUP - FIT LT4, KorTAIL FIT LT4</td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <form class="space-x-3" action="/konten/delete.php" method="post">
                                                    <a href="/konten/edit.php?id=<?= $content['id'] ?>" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, <?= $content['judul'] ?></span></a>
                                                    <input type="hidden" name="id" value="<?= $content['id'] ?>">
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete<span class="sr-only">, <?= $content['judul'] ?></span></button>
                                                </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php') ?>