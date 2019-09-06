<?php 
	error_reporting(E_ALL^(E_NOTICE | E_WARNING));
	$koneksi=mysqli_connect("localhost","root","","db_pos");
	$kodepj=$_GET['kodepj'];
	$kasir=$_GET['kasir'];
?>
<h4>Struck Belanjaan</h4>
<p>
	Toko Serba Ada<br>
	jln. Halat GG Makmur no.11
</p>
 <br>
<?php
	$sql=mysqli_query($koneksi, "SELECT * FROM tb_penjualan, tb_pelanggan WHERE tb_penjualan.id_pelanggan=tb_pelanggan.kode_pelanggan AND tb_penjualan.kode_penjualan='$kodepj'");
 	$data=mysqli_fetch_array($sql);
?>
<pre style="font-family: timesnewroman">
Kode Penjualan		: <?php echo $kodepj; ?>


Tanggal				: <?php echo $data['tgl_penjualan']; ?>


Pelanggan			: <?php echo $data['nama']; ?>


Kasir				: <?php echo $kasir; ?>
</pre>
<hr>
<table>
	<tr align="left">
		<th width="150px" >Nama Barang</th>
		<th width="100px" >Harga</th>
		<th width="100px" >Jumlah</th>
		<th>Total</th>
	</tr>
<?php 
$sql2=mysqli_query($koneksi, "SELECT * FROM tb_penjualan, tb_penjualan_detail, tb_barang WHERE tb_penjualan.kode_penjualan=tb_penjualan_detail.kode_penjualan AND tb_penjualan.kode_barang=tb_barang.kode_barang AND tb_penjualan.kode_penjualan='$kodepj'");
while ($data2=mysqli_fetch_array($sql2)) {
 ?>
	<tr>
		<td><div style="width: 130px; word-wrap: break-word;"><?php echo $data2['nama_barang']; ?></div></td>
		<td><?php echo number_format($data2['harga_jual']); ?></td>
		<td><?php echo $data2['jumlah'] ?></td>
		<td><?php echo number_format($data2['total']) ?></td>
	</tr>
<?php
	
	$diskon=$data2['diskon'];
	$potongan=$data2['potongan'];
	$bayar=$data2['bayar'];
	$kembali=$data2['kembali'];
	$subtotal=$data2['sub_total'];
	$total_bayar=$total_bayar+$data2['total'];
	}
?>
<tr>
	<td>&nbsp</td>
</tr>
<tr align="left">
	<th>Total</th>
	<td align="right"><?php echo $total_bayar; ?></td>
</tr>
<tr align="left">
	<th>Diskon</th>
	<td align="right"><?php echo $diskon; ?> %</td>
</tr>
<tr align="left">
	<th> Potongan</th>
	<td align="right"><?php echo number_format($potongan) ?></td>
</tr>
<tr align="left">
	<th>Bayar</th>
	<td align="right"><?php echo number_format($bayar) ?></td>
</tr>
<tr align="left">
	<th>Kembali</th>
	<td align="right"><?php echo number_format($kembali) ?></td>
</tr>
<tr align="left">
	<th>Sub Total</th>
	<td align="right"><b><?php echo number_format($subtotal) ?></b></td>
</tr>
<tr>
	<td>&nbsp</td>
</tr>
<tr>
	<td colspan="2">Barang Yang Sudah Dibeli Tidak Dapat diKembalikan</td>
</tr>
</table>

<button style="width: 80px; height:25px; margin-left: 300px; background-color: #2b982b; cursor: pointer; border-radius: 5px; border:0px;" onclick="window.print()">Print</button>

