<?php 
	$id=$_GET['id'];
	$sql=mysqli_query($koneksi, "DELETE FROM tb_barang WHERE kode_barang='$id'");
	if ($sql) {
		echo "
			<script>
				alert('Data Berhasil Dihapus');
				window.location.href='?page=barang';
			</script>
		";
	}
 ?>