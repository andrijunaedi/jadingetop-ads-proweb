<?php
include_once('./helper/auth.php');
validateUserSession();

$title = "Dashboard";
include_once('./components/Layout/header.php');
?>

<main class="pt-12 pb-20 px-14">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-semibold">Dashboard</h1>
    </div>
    <div class="my-8">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Last 30 days</h3>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Total Subscribers</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">71,897</dd>
            </div>

            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Avg. Open Rate</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">58.16%</dd>
            </div>

            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Avg. Click Rate</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">24.57%</dd>
            </div>
        </dl>
    </div>

</main>

<?php include_once('./components/Layout/footer.php') ?>