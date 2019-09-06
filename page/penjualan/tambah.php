<?php 
	$id=$_GET['id'];
	$hrg_jual=$_GET['hrg_jual'];
	$kod_brng=$_GET['kod_brng'];
	$kodepj=$_GET['kodepj'];

	$sql3=mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kode_barang='$kod_brng'");
	$cek=mysqli_fetch_array($sql3);
	$stock=$cek['stock'];
	if ($stock > 0) {
		$sql=mysqli_query($koneksi, "UPDATE tb_penjualan SET jumlah=(jumlah+1) WHERE id='$id'");
		$sql1=mysqli_query($koneksi, "UPDATE tb_penjualan SET total=($hrg_jual*jumlah) WHERE id='$id'");
		$sql2=mysqli_query($koneksi, "UPDATE tb_barang SET stock=(stock-1) WHERE kode_barang='$kod_brng'");

		if ($sql||$sql1||$sql2) {
			?>
			<script>
				window.location.href='?page=penjualan&kodepj=<?php echo $kodepj ?>';
			</script>
			<?php 
				}
			 
	}else{
		?>
			<script>
				alert('Stock Barang Habis');
				window.location.href='?page=penjualan&kodepj=<?php echo $kodepj ?>';
			</script>
	<?php
	}
 ?>