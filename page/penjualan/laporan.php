<?php
	error_reporting(E_ALL^(E_NOTICE | E_WARNING));
	$koneksi=mysqli_connect("localhost","root","","db_pos");
 ?>

 <style>
 	@media print{
 		.print{
 			display: none;
 		}
 	}
 </style>
<h3 align="center">LAPORAN PENJUALAN</h3>
 <table border="1" cellspacing="0" width="100%">
 	<tr>
 		<th>No</th>
 		<th>Tanggal</th>
 		<th>Kode Barang</th>
 		<th>Nama Barang</th>
 		<th>Harga Jual</th>
 		<th>Jumlah</th>
 		<th>Total</th>
 		<th>Profit</th>
 	</tr>
 <?php 
	$tgl_awal=date("d-m-Y", strtotime($_POST['tgl_awal']));
	$tgl_akhir=date("d-m-Y", strtotime($_POST['tgl_akhir']));
 	$sql=mysqli_query($koneksi, "SELECT * FROM tb_barang, tb_penjualan WHERE tb_barang.kode_barang=tb_penjualan.kode_barang AND tb_penjualan.tgl_penjualan BETWEEN '$tgl_awal' AND '$tgl_akhir'");
 	$no=1;
 	while ($data=mysqli_fetch_array($sql)) {
 		$jml_profit=$data['profit'] * $data['jumlah'];
 		?>
	<tr>
		<td align="center"><?php echo $no++; ?></td>
		<td align="center"><?php echo $data['tgl_penjualan']; ?></td>
		<td align="center"><?php echo $data['kode_barang']; ?></td>
		<td><?php echo $data['nama_barang']; ?></td>
		<td align="right"><?php echo number_format($data['harga_jual']) ?></td>
		<td align="center"><?php echo $data['jumlah']; ?></td>
		<td align="right"><?php echo number_format($data['total']) ?></td>
		<td align="right"><?php echo number_format($jml_profit) ?></td>
	</tr>
<?php 
	$total=$total+$data['total'];
	$profit=$profit+$jml_profit;
	}
  ?>
  	<tr>
		<th colspan="6" align="center"> Total Penjualan Dan Pofit</th>
		<th align="right"><?php echo number_format($total) ?></th>
		<th align="right"><?php echo number_format($profit) ?></th>
	</tr>
 </table>
<br><br>
<button class="print" onclick="window.print()">Cetak</button>