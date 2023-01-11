<?php
$title = "Tambah Saldo | Jadingetop Ads";
$active = "billing";
include_once(dirname(__DIR__) . '/components/Layout/header.php');
?>

<main class="pt-12 pb-20 px-14">
    <div class="flex flex-col">
        <h1 class="text-3xl font-semibold">Tambah Saldo</h1>
        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt similique dolorem, doloribus.</p> -->
    </div>
    <div class="my-8">
        <form action="/billing/topup-handler.php" method="post">
            <div class="w-4/12">
                <label for="nominal" class="block text-sm font-medium text-gray-700">Masukan Nominal</label>
                <div class="mt-1">
                    <input type="number" name="nominal" id="nominal" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="" min="10000" required aria-describedby="email-description">
                </div>
                <p class="mt-2 text-sm text-gray-500" id="email-description">Minimal topup saldo Rp 10.000</p>
            </div>
            <button type="submit" name="submit" class="my-4 inline-flex justify-center rounded-md border border-transparent bg-[#2B7FFF] py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-[#6BA6FF] focus:outline-none focus:ring-2 focus:bg-[#6BA6FF]  focus:ring-offset-2">Top Up</button>
        </form>
    </div>

</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php'); ?>