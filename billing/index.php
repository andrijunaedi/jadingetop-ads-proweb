<?php
$title = "Billing";
include_once(dirname(__DIR__) . '/components/Layout/header.php');
require_once(dirname(__DIR__) . '/models/Billings.php');

$Billing = new Billings();
$histories = $Billing->getAll();
var_dump($histories);
?>

<main class="pt-12 pb-20 px-14">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-semibold">Billing</h1>
    </div>
    <table class="min-w-full divide-gray-300">
        <thead class="bg-gray-50">
            <tr>
                <th>ID</th>
                <th>NOMINAL</th>
                <th>STATUS</th>
                <th>TANGGAL</th>
            </tr>
        </thead>
        <tbody class="divide-gray-300 bg-white">
            <tr>
                <td>1</td>
                <td>500000</td>
                <td>approved</td>
                <td>2022-12-06 09:14:55</td>
            </tr>
            <tr>
                <td>2</td>
                <td>50000</td>
                <td>pending</td>
                <td>2022-12-05 18:30:37</td>
            </tr>
            <tr>
                <td>3</td>
                <td>75000</td>
                <td>cancel</td>
                <td>2022-12-04 15:30:36</td>
            </tr>
        </tbody>
    </table>
</main>

<?php include_once(dirname(__DIR__) . '/components/Layout/footer.php') ?>