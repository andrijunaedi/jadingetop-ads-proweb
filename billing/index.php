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
        <h1 class="text-3xl font-semibold">Riwayat Transaksi</h1>
    </div>
    <div class="my-8">
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-4">
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Saldo saat ini</dt>
                <dd class="mt-1 text-2xl font-semibold tracking-tight">Rp 100,000,000</dd>
            </div>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Sukses</dt>
                <dd class="mt-1 text-2xl font-semibold tracking-tight text-green-500">71,897</dd>
            </div>

            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Menunggu Pembayaran</dt>
                <dd class="mt-1 text-2xl font-semibold tracking-tight text-orange-400">1,182</dd>
            </div>

            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Batal</dt>
                <dd class="mt-1 text-2xl font-semibold tracking-tight text-red-500">439</dd>
            </div>
        </dl>
    </div>
    <div class="py-4">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Transaksi</h1>
                <!-- <p class="mt-2 text-sm text-gray-700">A table of placeholder stock market data that does not make any sense.</p> -->
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-[#2B7FFF] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#6BA6FF] focus:outline-none focus:ring-2 focus:bg-[#6BA6FF] focus:ring-offset-2 sm:w-auto">Tambah Saldo</button>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID Transaksi</th>
                                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Nominal</th>
                                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Tanggal Transaksi</th>
                                    <th scope="col" class="relative whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Aksi</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">AAPS0L</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">Rp. 100.0000</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                                        <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Sukses</span>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">2 Januari 2023 - 08:50</td>
                                    <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <button type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Detail</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">AAPS0L</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">Rp. 100.0000</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                                        <span class="inline-flex rounded-full bg-orange-100 px-2 text-xs font-semibold leading-5 text-orange-900">Menunggu Pembayaran</span>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">2 Januari 2023 - 08:50</td>
                                    <td class="whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm flex justify-end gap-x-4 font-medium sm:pr-6">
                                        <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-green-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                                <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z" clip-rule="evenodd" />
                                                <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-1">
                                                Bayar
                                            </span>
                                        </button>
                                        <button type="button" class="inline-flex items-center rounded border border-transparent bg-red-100 px-2.5 py-2 text-xs font-medium text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Batalkan</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">AAPS0L</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">Rp. 100.0000</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">
                                        <span class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-900">Dibatalkan</span>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">2 Januari 2023 - 08:50</td>
                                    <td class="relative whitespace-nowrap py-2 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <button type="button" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Detail</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php') ?>