<?php 
    $tgl=date("m-d-Y");
    $sql=mysqli_query($koneksi, "SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.kode_barang=tb_barang.kode_barang AND tgl_penjualan='$tgl'");
    while ($data=mysqli_fetch_array($sql)) {
        $total=$total+$data['total'];
        $profit=$data['profit']*$data['jumlah'];
        $tot_profit=$tot_profit+ $profit;
    }
    $sql1=mysqli_query($koneksi, "SELECT * FROM tb_barang");
        $jml_data=mysqli_num_rows($sql1);
 ?>
<marquee style="font-size: 35px; font-family:'Baloo Bhai', cursive">Selamat Datang Di Sistem Informasi Penjualan </marquee>
<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">Data Barang</div>
                    <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $jml_data ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">add_shopping_cart</i>
                </div>
                <div class="content">
                    <div class="text">Penjualan Hari Ini</div>
                    <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo "Rp."."&nbsp".number_format($total) ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">attach_money</i>
                </div>
                <div class="content">
                    <div class="text">Profit Hari Ini</div>
                    <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?php echo "Rp."."&nbsp".number_format($tot_profit) ?></div>
                </div>
            </div>
        </div>
    </div>