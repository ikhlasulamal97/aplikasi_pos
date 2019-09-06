<?php 
	$id=$_GET['id'];
	$sql=mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE kode_pelanggan='$id'");
	$data=mysqli_fetch_array($sql);
?>
 <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        	<div class="header">
                <h2>Ubah Pelanggan</h2>
			<div class="body">
	        	<form action="" method="POST">
	        		<label>Nama</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="text" name="nama" class="form-control"  value="<?php echo $data['nama']  ?>" />
		                </div>
		            </div>
		            <label>Alamat</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" class="form-control" />
		                </div>
		            </div>
                	<label>Telepon</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="number" name="telepon" value="<?php echo $data['telepon'] ?>" class="form-control" />
		                </div>
		            </div>
		            <label>Email</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="text" name="email"  value="<?php echo $data['email'] ?>" class="form-control" />
		                </div>
		            </div>
		            <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
	            </form>
			</div>
		</div>
	</div>
</div>
</div>
<?php 
	if (isset($_POST['ubah'])) {
		$nama=$_POST['nama'];
		$alamat=$_POST['alamat'];
		$telepon=$_POST['telepon'];
		$email=$_POST['email'];
		$sql=mysqli_query($koneksi, "UPDATE tb_pelanggan SET nama='$nama', alamat='$alamat', telepon='$telepon', email='$email' WHERE kode_pelanggan='$id'");
		if ($sql) {
			echo "<script>
				alert('Data Berhasil Diubah');
				window.location.href='?page=pelanggan'
				</script>
			";
		}else{
			echo "<script>
				alert('Data Gagal Diubah');
				window.location.href='?page=pelanggan&aksi=ubah&id=$id'
				</script>
			";

		}
	}
 ?>