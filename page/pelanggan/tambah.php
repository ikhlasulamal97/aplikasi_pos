 <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        	<div class="header">
                <h2>Tambah Pelanggan</h2>
			<div class="body">
	        	<form action="" method="POST">
	        		<label>Nama</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="text" name="nama" class="form-control" autocomplete="no" />
		                </div>
		            </div>
		            <label>Alamat</label>
		            <div class="form-group">
		                <div class="form-line">
		                	<input type="text" name="alamat" class="form-control">
		                </div>
		            </div>
                	<label>Telepon</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="number" name="telepon" class="form-control" />
		                </div>
		            </div>
		            <label>Email</label>
		            <div class="form-group">
		                <div class="form-line">
		                    <input type="email" name="email" class="form-control" />
		                </div>
		            </div>
		            <input type="submit" name="tambah" value="tambah" class="btn btn-primary">
	            </form>
			</div>
		</div>
	</div>
</div>
</div>
<?php 
	if (isset($_POST['tambah'])) {
		$nama=$_POST['nama'];
		$alamat=$_POST['alamat'];
		$telepon=$_POST['telepon'];
		$email=$_POST['email'];

		if (empty($nama)&empty($alamat)&empty($telepon)&empty($email)) {
			echo "
				<script>
				alert('Masukkan Data Dengan Benar')
				window.location.href='?page=pelanggan&aksi=tambah'
				</script>
			";
		}else{
			$sql=mysqli_query($koneksi,"INSERT INTO tb_pelanggan VALUES('','$nama','$alamat','$telepon','$email')");
			if ($sql) {
				echo "<script>
					alert('Data Berhasil Disimpan');
					window.location.href='?page=pelanggan'
					</script>
				";
			}else{
				echo "<script>
					alert('Data Gagal Disimpan');
					window.location.href='?page=pelanggan&aksi=tambah'
					</script>
				";

			}
		}
	}
 ?>