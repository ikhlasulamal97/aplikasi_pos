<?php 
	$id=$_GET['id'];
	$sql=mysqli_query($koneksi,"DELETE FROM tb_pengguna WHERE id='$id'");
	if ($sql) {
		echo "
			<script>
				alert('Data Berhasil Dihapus');
				window.location.href='?page=pengguna';
			</script>
		";
	}else{
		echo "
			<script>
				alert('Data Gagal Dihapus');
				window.location.href='?page=pengguna';
			</script>
		";
	}
 ?>