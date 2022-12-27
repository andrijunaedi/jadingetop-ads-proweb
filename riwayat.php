<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi | Jadingetop Ads</title>
    <link rel="stylesheet" href="./assets/styles/style1.css">
</head>


<body>
    <div class="nav">
        <div class="sidebar">
            <h1 style="color: white;">Jadingetop.Ads</h1>
            <div class="sidebars">
                <div class="">
                    <img src="assets/images/dashboard.png" alt="">
                </div>
                <p>Dashboard</p>
            </div>
            <div class="sidebars">
                <div class="">
                    <img src="assets/images/konten.png" alt="">
                </div>
                <p>Konten</p>
            </div>
            <div class="sidebars">
                <div class="">
                    <img src="assets/images/billing.png" alt="">
                </div>
                <p>Billing</p>
            </div> 
        </div>
        <div class="main">
            <header>
                <div class="Header">
                    <div class="Saldo">
                        <div class="">
                            <img src="assets/images/saldo.png" alt="">
                        </div>
                        <p style="color: #4DD82A;">Rp100.000.000</p>
                    </div>
                    <button id="button"><img class="tambah" src="assets/images/tambah.png" alt=""> Tambah Saldo</button>
                    <div class="">
                        <img class="logo" src="assets/images/notif.png">
                    </div>
                    <div class="">
                        <img class="logo" src="assets/images/avatar.jpeg">
                    </div>
                </div>
            </header>
            <div class="konten-riwayat">
                <h1>Riwayat Transaksi</h1>
            </div>
            <div class="konten-row">
                <div class="col">
                    <div class="card">
                        <img src="assets/images/sukses.png" width="100px">
                        <div class="card-body">
                            <p style="font-size: 15px;">Sukses</p>
                            <h1 style="font-size:24px">20</h1>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="assets/images/tertunda.png" width="150px ;">
                        <div class="card-body">
                            <p style="font-size: 15px;">Tertunda</p>
                            <h1 style="font-size:24px">5</h1>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img src="assets/images/gagal.png" width="100px">
                        <div class="card-body">
                            <p>Gagal</p>
                            <h1 style="font-size:24px">2</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-konten">
                <table class="table-col" style="width:100%">
                    <tr>
                        <th>ID transaksi</th>
                        <th>Tanggal</th>
                        <th>Nominal</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>3666948000000</td>
                        <td>2022-12-22 14:38:45</td>
                        <td>Rp100.000</td>
                        <td style="color: #4DD82A;">Sukses</td>
                    </tr>
                    <tr>
                        <td>3666678089999</td>
                        <td>2022-12-22 13:43:34</td>
                        <td>Rp50.000</td>
                        <td style="color: #E28644;">Tertunda</td>
                    </tr>
                    <tr>
                        <td>3666266199900</td>
                        <td>2022-12-22 12:57:49</td>
                        <td>Rp75.000</td>
                        <td style="color: #BB2020;">Gagal</td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <!-- table -->
</body>

</html>