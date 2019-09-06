 <!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="font-weight: bold;">
                    DATA PENGGUNA
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php 
                        		$no=1;
                        		$sql=mysqli_query($koneksi,"SELECT * FROM tb_pengguna");
                        		while ($data=mysqli_fetch_array($sql)) {
                        		
                        		
                        	 ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['password']; ?></td>
                                <td><?php echo $data['level']; ?></td>
                                <td align="center"><img src="images/<?php echo $data['foto']; ?>" width="100px" height="150px"> </td>
                                <td>
                                	<a href="?page=pengguna&aksi=ubah&id=<?php echo $data['id'] ?>" class="btn btn-success">Ubah</a>
                                	<a href="?page=pengguna&aksi=hapus&id=<?php echo $data['id'] ?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus !!!')" class="btn btn-danger">Hapus</a>
                                </td>

                            </tr>
                           <?php 
                           		}
                            ?>
                            </tbody>
                    </table>
					<a href="?page=pengguna&aksi=tambah" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->