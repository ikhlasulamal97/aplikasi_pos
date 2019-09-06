<style>
	@media print{
		.print{
			display: none;
		}
	}
</style>
<table border="1" width="100%" cellspacing="0">
	<tr>
		<th>No</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>Satuan</th>
		<th>Harga Beli</th>
		<th>Stock</th>
		<th>Harga Jual</th>
		<th>Profit</th>
	</tr>
	<?php 
		$koneksi=mysqli_connect("localhost","root","","db_pos");
		$sql=mysqli_query($koneksi, "SELECT * FROM tb_barang");
		$no=1;
		while($data=mysqli_fetch_array($sql)){
	 ?>
	<tr align="center">	
		<td><?php echo $no++; ?></td>
		<td><?php echo $data['kode_barang']; ?></td>
		<td align="left"><?php echo $data['nama_barang']; ?></td>
		<td><?php echo $data['satuan']; ?></td>
		<td align="right"><?php echo $data['harga_beli']; ?></td>
		<td><?php echo $data['stock']; ?></td>
		<td align="right"><?php echo $data['harga_jual']; ?></td>
		<td align="right"><?php echo $data['profit']; ?></td>
	</tr>
	<?php 
		}
	 ?>
</table>
<br><br>
<button class="print" onclick="window.print()">Print</button>