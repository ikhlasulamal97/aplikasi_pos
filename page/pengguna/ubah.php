<?php 
	$id=$_GET['id'];
	$sql=mysqli_query($koneksi,"SELECT * FROM tb_pengguna WHERE id='$id'");
	$data=mysqli_fetch_array($sql);
 ?>

 <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        	<div class="header">
                <h2>Ubah Pengguna</h2>
				<div class="body">
		        	<form action="" method="POST" enctype="multipart/form-data" >
		        		<input type="hidden" name="gambarlama" value="<?php echo $data['foto'] ?>">
		        		<label>Username</label>
			            <div class="form-group">
			                <div class="form-line">              			
			                    <input type="text" name="user" value="<?php echo $data['username'] ?>" class="form-control" autocomplete="no" />
			                </div>
			            </div>
			            <label>Nama</label>
			            <div class="form-group">
			                <div class="form-line">
			                	<input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control">
			                </div>
			            </div>
			            <label>level</label>
			            <div class="body">
				            <div class="row clearfix">
		                        <select class="form-control show-tick" name="level">
		                            <option value="">-- Pilih Level --</option>
		                            <option value="Admin" <?php if ($data["level"]=="Admin") { echo "SELECTED";  } ?> >Admin</option>
		                            <option value="Kasir" <?php if ($data["level"]=="Kasir") { echo "SELECTED";  } ?>  >Kasir</option>
		                        </select>
		                    </div>
	                	</div>
	                    <label>Foto</label>
			            <div class="form-group">
			                <div class="form-line">
			                    <img src="images/<?php echo $data['foto'] ?>" width="150px" height="100px">
			                </div>
			            </div>
			             <label>Ganti Foto</label>
			            <div class="form-group">
			                <div class="form-line">
			                	<input type="file" name="foto" class="form-control">
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
	if (isset($_POST['ubah'])) 
	{
		$user=$_POST['user'];
		$nama=$_POST['nama'];
		$level=$_POST['level'];
		$gbrlama=$_POST['gambarlama'];


		if (!$_FILES['foto']['error']==4) {
		// Untuk Upload Foto
		$foto=$_FILES['foto']['name'];
		$ukuran=$_FILES['foto']['size'];
		$simpan_sementara=$_FILES['foto']['tmp_name'];

		// cek apakah yang diupload adalah foto
		$ekstensi=["jpg","jpeg","png"];
		$pecahfoto=explode(".", $foto);
		$hasil=strtolower(end($pecahfoto));


		// Membuat nama foto yang unik
		
		
		$random=$pecahfoto[0];
		$random .= "_";
		$random .=rand(1,100);
		$random .= ".";
		$random .= $hasil;
		 if (!in_array($hasil, $ekstensi)) 
			{
				echo "
						<script>
							alert('File Yang Anda Masukkan Bukan Foto');
							window.location.href='?page=pengguna&aksi=ubah&id=$id'
						</script>
					";
				$random=$gbrlama;
			}else
				{
					if ($ukuran>2097152) {
						echo "
						<script>
							alert('Ukuran Foto Terlalu Besar (Maks 2MB)');
							window.location.href='?page=pengguna&aksi=ubah&id=$id'
						</script>
					";
					}else{
						$letak=move_uploaded_file($simpan_sementara, "images/".$random);
					}
				}

		}else{
			$random=$gbrlama;
		}
		if ($user=="" OR $nama=="" OR $level=="") 
		{
			echo "
				<script>
				alert('Data Tidak Boleh Kosong')
				window.location.href='?page=pengguna&aksi=ubah&id=$id'
				</script>
			";
		}else{
				$sql=mysqli_query($koneksi, "UPDATE tb_pengguna SET username='$user', nama='$nama', level='$level', foto='$random' WHERE id='$id' ");
				if ($sql)
				{
					echo "<script>
						alert('Data Berhasil Diubah');
						window.location.href='?page=pengguna'
						</script>
					";
				}else
					{
						echo "<script>
							alert('Data Gagal Diubah');
							window.location.href='?page=pengguna&aksi=ubah&id=$id'
							</script>
						";
					}	
			}
	}
 ?>