 <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        	<div class="header">
                <h2>Tambah Pengguna</h2>
				<div class="body">
		        	<form action="" method="POST" enctype="multipart/form-data" >
		        		<label>Username</label>
			            <div class="form-group">
			                <div class="form-line">              			
			                    <input type="text" name="user" class="form-control" autocomplete="no" />
			                </div>
			            </div>
			            <label>Nama</label>
			            <div class="form-group">
			                <div class="form-line">
			                	<input type="text" name="nama" class="form-control">
			                </div>
			            </div>
	                	<label>Password</label>
			            <div class="form-group">
			                <div class="form-line">
			                    <input type="password" name="pass" class="form-control" />
			                </div>
			            </div>
			            <label>level</label>
			            <div class="body">
				            <div class="row clearfix">
		                        <select class="form-control show-tick" name="level">
		                            <option value="">-- Pilih Level --</option>
		                            <option value="Admin">Admin</option>
		                            <option value="Kasir">Kasir</option>
		                        </select>
		                    </div>
	                	</div>
	                    <label>Foto</label>
			            <div class="form-group">
			                <div class="form-line">
			                    <input type="file" name="foto" class="form-control" />
			                </div>
			            </div>
			            <input type="submit" name="tambah" value="Tambah" class="btn btn-primary">
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	if (isset($_POST['tambah'])) 
	{
		$user=$_POST['user'];
		$nama=$_POST['nama'];
		$pass=$_POST['pass'];
		$level=$_POST['level'];

		// Untuk Upload Foto
		$foto=$_FILES['foto']['name'];
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
		


		if ($user=="" OR $nama=="" OR $pass=="" OR $level=="" OR $foto=="") 
		{
			echo "
				<script>
				alert('Data Tidak Boleh Kosong')
				window.location.href='?page=pengguna&aksi=tambah'
				</script>
			";
		}else{
				if (!in_array($hasil, $ekstensi)) 
				{
					echo "
							<script>
								alert('File Yang Anda Masukkan Bukan Foto');
								window.location.href='?page=pengguna&aksi=tambah'
							</script>
						";
				}else
					{
						$letak=move_uploaded_file($simpan_sementara, "images/".$random);
						if ($letak) 
						{
							$sql=mysqli_query($koneksi,"INSERT INTO tb_pengguna VALUES('','$user','$nama','$pass','$level','$random')");
							if ($sql)
							{
								echo "<script>
									alert('Data Berhasil Disimpan');
									window.location.href='?page=pengguna'
									</script>
								";
							}else
								{
									echo "<script>
										alert('Data Gagal Disimpan');
										window.location.href='?page=pengguna&aksi=tambah'
										</script>
									";
								}
						}
					}		
			}
	}
 ?>