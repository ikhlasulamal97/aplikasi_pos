<?php 
	$id=$_GET['id'];
	$sql=mysqli_query($koneksi, "DELETE FROM tb_pelanggan WHERE kode_pelanggan='$id'");
	if ($sql) {
		echo "
			<script>
				alert('Data Berhasil Dihapus');
				window.location.href='?page=pelanggan'
			</script>
		";
	}else{
		echo "
			<script>
				alert('Data Gagal Dihapus');
				window.location.href='?page=pelanggan'
			</script>
		";
	}
 ?>