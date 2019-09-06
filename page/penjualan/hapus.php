<?php 
	$id=$_GET['id'];
	$kod_brng=$_GET['kod_brng'];
	$kodepj=$_GET['kodepj'];
	$jml=$_GET['jml'];

	$sql=mysqli_query($koneksi,"DELETE FROM tb_penjualan WHERE id='$id'");
	$sql1=mysqli_query($koneksi, "UPDATE tb_barang SET stock=(stock+$jml) WHERE kode_barang='$kod_brng'");

	if ($sql||$sql1) {
		?>
		<script>
			window.location.href='?page=penjualan&kodepj=<?php echo $kodepj ?>'
		</script>
	
<?php 
	}
 ?>