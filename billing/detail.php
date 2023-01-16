<?php
$title = "Detail Tagihan | Jadingetop Ads";
$active = "billing";
include_once(dirname(__DIR__) . '/components/Layout/header.php');
require_once(dirname(__DIR__) . '/models/Billings.php');

$id = $_GET['id'];

if ($id) {
    $Billing = new Billings($userId);

    $bill = $Billing->getById($id);

    if ($bill == NULL) {
        header('Location: /billing/index.php');
        exit;
    }

    $Billing->close();
} else {
    header('Location: /billing/index.php');
}

?>

<main class="pt-12 pb-20 px-14">
    <div class="flex flex-col">
        <h1 class="text-3xl font-semibold">Tagihan</h1>
        <p>Berikut adalah detail informasi penagihan transaksi topup.</p>
    </div>
    <div class="my-8" x-data="{ 'showModal': false, 'id': 0 }" @keydown.escape="showModal = false">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Informasi Tagihan</h3>
                <!-- <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p> -->
            </div>
            <div class="border-gray-200 px-4 py-5 sm:p-0">
                <dl>
                    <div class="py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">ID Transaksi</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-3 sm:mt-0"><?= $bill['id'] ?></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Tagihan Kepada</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-3 sm:mt-0"><?= $username ?></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Total Tagihan</dt>
                        <dd class="mt-1 text-sm font-bold text-gray-900 sm:col-span-3 sm:mt-0">Rp <?= number_format($bill['nominal']) ?></dd>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:py-5 sm:px-6">
                        <?php if ($bill['status'] == 'success') : ?>
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1 text-sm text-green-600 sm:col-span-3 sm:mt-0">Pembayaran Berhasil</dd>
                        <?php elseif ($bill['status'] == 'cancel') : ?>
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1 text-sm text-red-600 sm:col-span-3 sm:mt-0">Pembayaran Dibatalkan</dd>
                        <?php else : ?>
                            <dt class="text-sm font-medium text-gray-500">Transfer Pembayaran</dt>
                            <dd class="mt-1 text-sm text-gray-900 flex flex-col sm:col-span-3 sm:mt-0 lg:flex-row lg:gap-x-8">
                                <div class="flex flex-col">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="35" viewBox="4.445 2.992 462.37 145.055">
                                        <path fill="#005FAF" stroke="#005FAF" d="M255.169 72.04c29.217-13.252 33.538-56.497-8.021-56.497H199.02l-17.786 34.875h8.37l-21.274 83.351h55.8c40.709.348 59.017-47.588 31.039-61.729zm-31.039 31.388h-13.95l5.231-18.832h13.252c15.694 3.138 5.93 19.529-4.533 18.832zm8.37-40.107h-11.857l3.487-16.391h13.252c12.805 3.139 1.745 17.089-4.882 16.391z" />
                                        <path fill="#005FAF" stroke="#005FAF" d="M369.418 60.083l18.271-32.254-24.723-12.896-3.225 3.98c-13.337-7.06-83.176 2.688-87.549 71.581 2.614 57.793 67.373 47.397 73.725 43.73l17.811-36.819c-17.444 11.49-53.162 17.006-54.673-17.509 3.133-28.462 36.737-39.091 60.363-19.813zM460.592 15.543h-56.169l-17.854 33.831h9.172l-42.33 84.395h40.973l8.412-20.356h25.151l.627 20.356h37.717l-5.699-118.226zm-46.401 70.463l13.755-32.833.627 32.833h-14.382z" />
                                        <g fill="#005FAF">
                                            <path d="M109.826 128.125l2.182-.633-2.393-3.307zM74.004 127.562l-.422 2.956c1.086-.106 2.423.83 2.956-1.267-.04-1.634-1.284-1.724-2.534-1.689zM91.388 127.492c-.181-.805-.853-1.398-2.534-.844l.563 3.025c1.381-.306 2.091-1.123 1.971-2.181zM52.117 125.016l-.672 2.688c1.08.045 2.345.921 3.062-.672.048-.998.089-1.992-2.39-2.016zM89.91 131.926l.493 3.097c1.153.029 2.205-.664 1.9-2.111-.294-1.392-1.463-1.172-2.393-.986z" />
                                            <path d="M135.678 17.137C98.411-1.848 53.904-1.32 18.396 16.309c-18.31 32.233-18.893 77.332 0 117.276 39.119 19.796 82.385 18.492 117.557.828 16.53-33.913 19.26-74.721-.275-117.276zm-62.94 96.248l-2.209.025c-.547-6.104-2.006-11.234-5.136-15.16C51.04 80.251 21.7 93.802 29.239 63.213c3.92-15.638 48.633-24.861 43.499 50.172zM29.292 83.173c3.134 6.379 22.769 7.424 29.585 12.307 10.812 7.745 9.26 17.933 9.26 17.933h-2.55c-5.02-15.387-19.109-3.204-30.394-7.348-7.085-2.52-12.229-13.443-5.901-22.892zm35.774 50.161l1.056-8.375 1.9.141-.845 9.219c-.852 4.061-6.907 3.518-7.671-.352l.985-9.571 2.252.353-.985 8.022c.125 2.655 2.788 2.496 3.308.563zm-10.111 2.287l-2.166-.523c.254-1.79 2.377-5.432-1.819-5.432l-1.168 4.76-2.39-.448 2.539-11.427c6.206.676 6.749 2.403 6.872 4.257-.245 1.438-.628 2.442-1.867 2.688 1.45 1.316.017 4.074-.001 6.125zm-13.757-12.799c-.597.792-1.792 3.559-1.965 5.764-.184 2.337 2.061 1.845 2.62 1.572.451-.219.786-2.096.786-2.096l-1.572-.524.524-1.571 3.538 1.179-1.703 5.896-1.441-.394.131-.917c-1.764.804-4.993.201-5.372-1.834-.379-1.635.769-6.592 2.62-8.908 1.799-2.252 6.182-.051 6.289 1.31.106 1.356-.429 2.882-.429 2.882l-1.65-.311s.101-.49.245-1.262c.152-.818-1.981-1.637-2.621-.786zm32.173 9.596l-.422 5.068-1.759-.07.633-12.035c4.393.091 6.911.699 6.827 3.801-.262 4.238-3.694 3.285-5.279 3.236zm4.379-19.006h-2.943c-.261-10.422 1.743-29.485-3.733-43.514-4.149-10.635-14.649-15.419-16.976-24.01-3.684-13.598 2.586-28.311 23.652-29.444 18.263 1.875 23.874 15.974 20.759 29.101-5.356 13.125-10.713 11.239-17.382 24.313-5.447 14.015-3.373 32.376-3.377 43.554zm32.639 19.288l-2.041.704-.634-12.105 2.393-.633 5.912 9.993-1.619 1.056-1.971-2.814-2.252.844.212 2.955zm-23.811-19.288h-2.354c1.94-26.766 35.575-20.951 38.649-30.239 5.316 9.208 3.405 16.972-2.146 20.952-13.794 9.894-27.021-7.322-34.149 9.287zm12.481 13.518l1.056 5.56c.657 1.281 1.103 1.044 2.111.915 1.169-.846.925-1.67.704-2.745l2.041-.281c.532 4.028-1.383 4.439-2.815 4.715-3.071.22-3.673-.378-4.504-4.363-.484-3.411-1.32-7.013 1.548-7.671 4.708-.719 4.43 1.4 4.856 2.885l-2.041.353c-.326-1.276-.795-1.782-1.83-1.688-.943.433-1.33 1.134-1.126 2.32zm-4.293 5.77c.098 1.753-.497 2.917-1.619 3.308l-4.786.985-1.9-11.612c.982-.16 5.797-1.924 6.967 1.268.577 1.949-.021 2.648-.704 3.518 1.295.416 1.732 1.424 2.042 2.533zm-12.29-58.273c10.662-30.02 35.059-24.715 40.47-11.213 7.413 27.093-16.457 19.663-31.747 30.773-5.779 5.026-8.82 10.792-8.865 19.533h-2.62c-.157-17.606-.442-30.073 2.762-39.093z" />
                                        </g>
                                    </svg>
                                    <span>Koral Retail Indonesia (Admin Regina)</span>
                                    <span class="font-bold">3417147148</span>
                                </div>
                                <div class="flex flex-col">
                                    <svg width="115" height="40" version="1.1" viewBox="0 0 308 63" xmlns="http://www.w3.org/2000/svg">
                                        <title>Gopay logo</title>
                                        <g transform="scale(4.889 3.938)" fill="none" fill-rule="evenodd">
                                            <path d="m0 0h63v16h-63z" fill="#fff" fill-opacity=".01" />
                                            <g transform="translate(0,1.143)">
                                                <ellipse cx="6.811" cy="6.857" rx="6.811" ry="6.857" fill="#00aed6" fill-rule="nonzero" />
                                                <path d="m10.78 6.644a1.587 1.587 0 0 0-1.652-1.5h-4.302a0.285 0.285 0 0 1-0.284-0.286c0-0.158 0.127-0.286 0.284-0.286h4.359a1.362 1.362 0 0 0-0.993-1.26 10.97 10.97 0 0 0-3.84 0 1.82 1.82 0 0 0-1.362 1.526 13.71 13.71 0 0 0 0 4.06 1.92 1.92 0 0 0 1.552 1.526 19.13 19.13 0 0 0 4.748 0 1.669 1.669 0 0 0 1.317-1.44c0.14-0.772 0.199-1.556 0.173-2.34zm-1.413 0.96v0.254a0.285 0.285 0 0 1-0.284 0.286 0.285 0.285 0 0 1-0.284-0.286v-0.254a0.427 0.427 0 0 1 0.284-0.746 0.427 0.427 0 0 1 0.284 0.746z" fill="#fff" />
                                            </g>
                                            <g fill="#000" fill-rule="nonzero">
                                                <path d="m18.94 11.41a2.921 2.921 0 0 0 2.545 1.252c1.187 0 2.059-0.763 2.059-1.8v-0.547h-0.029c-0.65 0.64-1.537 0.974-2.444 0.922a3.955 3.955 0 0 1-3.513-1.94 4.012 4.012 0 0 1-0.037-4.033 3.956 3.956 0 0 1 3.478-2.002 3.39 3.39 0 0 1 2.516 0.892h0.029v-0.748h2.03v7.428c0 2.159-1.7 3.656-4.089 3.656a4.87 4.87 0 0 1-4.06-1.814zm4.519-4.622c0-0.863-0.973-1.655-2.059-1.655-1.373 0-2.288 0.835-2.288 2.087-0.04 0.594 0.18 1.175 0.605 1.588a1.995 1.995 0 0 0 1.597 0.557c1.187 0 2.145-0.748 2.145-1.684zm7.46-3.598c2.474 0 4.276 1.77 4.276 4.03s-1.802 4.031-4.276 4.031a4.005 4.005 0 0 1-3.692-1.935 4.063 4.063 0 0 1 0-4.191 4.005 4.005 0 0 1 3.692-1.935zm0 1.87a2.152 2.152 0 0 0-2.13 2.17 2.152 2.152 0 0 0 2.15 2.15 2.152 2.152 0 0 0 2.14-2.16 2.075 2.075 0 0 0-0.605-1.562 2.045 2.045 0 0 0-1.555-0.597zm5.374-1.654h2.03v0.676h0.03a3.359 3.359 0 0 1 2.444-0.892c2.18 0.04 3.928 1.828 3.932 4.023 4e-3 2.196-1.738 3.99-3.918 4.038-0.86 0.02-1.7-0.265-2.373-0.806h-0.029v3.829h-2.116zm4.176 1.67c-1.116 0-2.06 0.791-2.06 1.655v0.964c0 0.922 0.916 1.684 2.073 1.684a2.145 2.145 0 0 0 2.131-2.158 2.145 2.145 0 0 0-2.144-2.146zm8.337 1.41c1.387-0.187 1.802-0.388 1.802-0.777 0-0.504-0.53-0.806-1.344-0.806a1.79 1.79 0 0 0-1.888 1.367l-2.002-0.417c0.286-1.555 1.874-2.663 3.832-2.663 2.216 0 3.59 1.137 3.59 2.993v4.852h-1.903v-0.835h-0.03a3.117 3.117 0 0 1-2.559 1.051c-1.673 0-2.83-0.921-2.83-2.275 0-1.425 0.943-2.159 3.331-2.49zm1.973 0.806h-0.028c-0.187 0.274-0.587 0.432-1.616 0.62-1.244 0.23-1.687 0.474-1.687 0.92 0 0.461 0.372 0.663 1.172 0.663 1.216 0 2.16-0.562 2.16-1.296v-0.907zm6.044 3.326-3.503-7.212h2.331l2.302 4.98h0.028l2.274-4.98h2.345l-5.247 10.87h-2.331z" />
                                            </g>
                                        </g>
                                    </svg>
                                    <span>Koral Retail Indonesia (Admin Febiani)</span>
                                    <span class="font-bold">0812 2161 4101</span>
                                </div>
                            </dd>
                        <?php endif; ?>
                    </div>
                    <div class="py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:py-5 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Perubahan Terakhir</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-3 sm:mt-0"><?= $bill['updated_at'] ?></dd>
                    </div>
                    <?php if ($bill['status'] == 'pending') : ?>
                        <div class="py-4 sm:grid sm:grid-cols-4 sm:gap-4 sm:py-5 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500"></dt>
                            <dd class="text-sm font-bold text-gray-900 flex items-center gap-5 sm:col-span-3 sm:mt-0">
                                <a href="https://wa.me/6281221614101?text=<?= urlencode(" Halo, \n\nKonfirmasi pembayaran \nEmail: {$_SESSION['user']['email']} \nID Transaksi: {$bill['id']} \nNominal: Rp {$bill['nominal']}") ?>" target="_blank" class="inline-flex items-center rounded-md border border-transparent bg-green-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-1">
                                        Konfirmasi Pembayaran
                                    </span>
                                </a>
                                <button @click="showModal = true, id = <?= $bill['id'] ?>" type="button" class="inline-flex items-center rounded border border-transparent bg-red-100 px-2.5 py-2 text-sm font-medium text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Batalkan</button>
                            </dd>
                        </div>
                    <?php endif; ?>
                </dl>
            </div>
        </div>

        <!-- <div class="flex mt-5 ml-5 gap-x-5 items-center">
            <a href="#" class="text-gray-600 hover:underline">Lihat Jam Operasional</a>
        </div> -->

        <!-- Cancel Billing -->
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
                                <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Batalkan Pembayaran</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Apakah Anda yakin membatalkan pembayaran ini?</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                            <form action="/billing/cancel.php" method="post">
                                <input type="hidden" name="id" x-model="id">
                                <button @click="showModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:w-auto sm:text-sm">Batal</button>
                                <button type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">Batalkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php'); ?>