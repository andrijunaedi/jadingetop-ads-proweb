<?php
include_once(dirname(__DIR__) . '/helper/auth.php');
validateUserSession();
$userId = $_SESSION['user']['id'];

$title = "Detail";
include_once(dirname(__DIR__) . '/components/Layout/header.php');
require_once(dirname(__DIR__) . '/models/Konten.php');
require_once(dirname(__DIR__) . '/models/Device.php');

$id = $_GET['id'];

if ($id) {
    $Konten = new Konten($userId);

    $content = $Konten->getById($id);
    $devices_selected = $Konten->getDevicesById($id);

    if ($content == NULL) {
        header('Location: /konten/index.php');
        exit;
    }

    $Konten->close();
} else {
    header('Location: /konten/index.php');
}

?>

<main class="pt-4 pb-20 px-14">
    <div class="mx-auto max-w-2xl py-10 sm:py-10 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-4">
        <!-- Product details -->
        <div class="">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"><?= $content['judul'] ?></h1>
            </div>

            <section aria-labelledby="information-heading" class="mt-4">
                <h2 id="information-heading" class="sr-only">Product information</h2>

                <div class="mt-6 flex items-center gap-x-5">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                        </svg>
                        <p class="ml-2 text-sm text-gray-500"><?= ucwords($content['orientasi']) ?></p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <p class="ml-2 text-sm text-gray-500"><?= ucwords($content['durasi']) ?> detik</p>
                    </div>
                </div>
            </section>

            <section class="mt-10" aria-labelledby="options-heading">
                <h2 id="options-heading" class="sr-only">Product options</h2>
                <div class="sm:flex sm:justify-between">
                    <!-- Size selector -->
                    <fieldset>
                        <legend class="block text-sm font-medium text-gray-700">Device</legend>
                        <div class="mt-1 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <?php if (is_array($devices_selected)) : ?>
                                <?php foreach ($devices_selected as $device) : ?>
                                    <div class="relative block cursor-pointer rounded-lg border border-gray-300 p-4 focus:outline-none">
                                        <input type="radio" name="size-choice" value="18L" class="sr-only" aria-labelledby="size-choice-0-label" aria-describedby="size-choice-0-description">
                                        <p id="size-choice-0-label" class="text-base font-medium text-gray-900"><?= $device['nama'] ?></p>
                                        <p id="size-choice-0-description" class="mt-1 text-sm text-gray-500"><?= $device['lokasi'] ?></p>
                                        <div class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></div>
                                    </div>
                                <?php endforeach ?>
                            <?php else : ?>
                                <div class="relative block cursor-pointer rounded-lg border border-gray-300 p-4 focus:outline-none">
                                    <input type="radio" name="size-choice" value="18L" class="sr-only" aria-labelledby="size-choice-0-label" aria-describedby="size-choice-0-description">
                                    <p id="size-choice-0-label" class="text-base font-medium text-gray-900">No Device</p>
                                    <p id="size-choice-0-description" class="mt-1 text-sm text-gray-500">Konten ini tidak mempunyai device</p>
                                    <div class="pointer-events-none absolute -inset-px rounded-lg border-2" aria-hidden="true"></div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </fieldset>
                </div>
                <!-- <div class="mt-10">
                        <button type="submit" class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">Add to bag</button>
                    </div> -->
            </section>
        </div>

        <!-- Product image -->
        <div class="mt-10 lg:col-start-2 lg:row-span-2 lg:mt-0 lg:self-center">
            <div class="aspect-w-1 aspect-h-1 overflow-hidden rounded-lg">
                <img src="<?= $content['konten'] ?>" alt="<?= $content['judul'] ?>" class="h-full w-full object-cover object-center">
            </div>
        </div>
    </div>

</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php') ?>